<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    /** Display a listing of the resource. */
    public function index()
    {
        return view('admin.tags.index')->with('tags', Tag::all());
    }

    /** Show the form for creating a new resource. */

    public function create()
    {
        return view('admin.tags.create'); 
    }

    /** Store a newly created resource in storage. */

    public function store(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required'
        ]);
        
        Tag::create([
            'tag' => $request->tag
        ]);
        Session::flash('info', 'The Tag has been created successfully!');
        return redirect()->route('tags');
    }

    /** Display the specified resource. **/
    public function show($id)
    {
        //
    }
    /** Show the form for editing the specified resource. **/
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit')->with('tag', $tag);
    }
    /** Update the specified resource in storage. */
    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'tag' => 'required'
       ]);
       $tag = Tag::find($id);
       $tag->tag = $request->tag;
       $tag->save();
       Session::flash('info', 'The '.$tag->tag.' Tag was Updated!');
       return redirect()->route('tags');
    }
    /** Remove the specified resource from storage. **/
    public function destroy($id)
    {
        Tag::destroy($id);
        Session::flash('info', 'The Tag has been Deleted!');
        return redirect()->route('tags');
    }
}
