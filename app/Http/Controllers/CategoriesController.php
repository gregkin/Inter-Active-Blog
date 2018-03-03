<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoriesController extends Controller
{
    /*** Display a listing of the resource. ***/

    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all());
    }

    /* * @return \Illuminate\Http\Response */
  
    public function create()
    {
       return view('admin.categories.create');
    }
    
    /** Store a newly created resource in storage.**/
    /** @param  \Illuminate\Http\Request  $request @return \Illuminate\Http\Response**/

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('info', 'You created a new Category named '.$category->name);
        return redirect()->route('categories');
    }

    /** @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /** Show the form for editing the specified resource. */
    /** @param  int  $id */
    /** @return \Illuminate\Http\Response */

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    /** Update the specified resource in storage. */
    /** @param  \Illuminate\Http\Request  $request */
    /** * @param  int  $id */
    /* * @return \Illuminate\Http\Response */

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('info', 'You updated the '.$category->name.' Category');
        return redirect()->route('categories');
    }

    /** Remove the specified resource from storage. */
    
    public function destroy($id)
    {
        $category = Category::find($id); 
        foreach($category->posts as $post)
        {
            $post->forceDelete();
        }

        $category->delete();
        Session::flash('info', 'You deleted the Category '.$category->name);
        return redirect()->route('categories'); 
    }
}
