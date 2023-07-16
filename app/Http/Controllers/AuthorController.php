<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Models\Author;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $author = Author::all();
        return view('author.index',['authors'=>$author]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|max:20',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $name_gen =  hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/authors/' . $name_gen);
        $save_url = 'upload/authors/' . $name_gen;
        // $path = $request->file('image')->store('/public/AuthorsImages/');
        // Storage::makeDirectory(dirname($path));

        $author = new Author();
        $author->author_name = $request->author_name;
        $author->path = $save_url;
        $author->save();
        return redirect()->route('author.index')->with('success','Author Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $author = new Author();
        $author = Author::find($id);
        return view('author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'author_name' => 'required|max:20',
        ]);
        $author = Author::find($id);
        $author->author_name=$request->author_name;
        $author->save();
        return redirect()->route('author.index')->with('success','Author Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::destroy($id);
        return back()->with('danger', 'Author Deleted');
    }
}
