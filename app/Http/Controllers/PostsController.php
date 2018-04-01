<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /** @return \Illuminate\Http\Response */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }
     /** Show the form for creating a new resource.*/
     public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info','You must create a Category and a Tag before creating your post!');

            return redirect()->back();
        };
        return view('admin.posts.create')->with('categories', $categories)->with('tags', $tags);
    }
    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required', 
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        $post = Post::create([
            'title' => $request->title, 
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);
        $post->tags()->attach($request->tags);

        Session::flash('info', 'The '.$post->title.' has been created successfully!');

        return redirect()->route('posts');
    }

    /** Display the specified resource.  */
    public function show($id)
    {
        //
    }
    /** Show the form for editing the specified resource. **/ 
    public function edit($id)
    {
       $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response  */

    public function update(Request $request, $id)
    {
        // validate the data
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required', 
            'category_id' => 'required'
        ]);
        // Find the post
         $post = Post::find($id);
        // if the featured file has been changed
        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }
        // request the fields to be updated
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        // Save the Post
        $post->save();
        // Synching the posts and tags.
        $post->tags()->sync($request->tags);
        // Flash the message
        Session::flash('info', 'The '.$post->title.' Post has been Updated Successfully!');
        // Return back to the All Posts Page
        return redirect()->route('posts');
    }

    /** Remove the specified resource from storage. */

    public function destroy($id)
    {
       $post = Post::find($id);
       $post->delete();
       Session::flash('info', 'The '.$post->title.' Post has been trashed!');
       return redirect()->route('posts');
    }
   public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }
    public function kill($id)
     {
         $post = Post::withTrashed()->where('id', $id)->first();
         $post->forceDelete();
         Session::flash('info', 'The '.$post->title.' Post has been permanently deleted!
            ');
         return redirect()->back();
     } 
     public function restore($id)
     {
         $post = Post::withTrashed()->where('id', $id)->first();
         $post->restore();
         Session::flash('info', 'The '.$post->title.' Post has been restored!');
         return redirect()->route('posts');
     }
}
