<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::all();
        
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats =  Category::all();
        $authors = Author::all();
        return view('book.create', compact('cats', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        // validation
        $request->validate([
            'title' => ['required', 'max:30'],
            'description' => ['required'],
            'image' => ['required','file','max:15360', 'mimes:png,jpg,jpeg,tif'],
            'author' => 'required',
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'exists:categories,id', 'distinct'],
        ]);


        $image = $request->file('image');
        $name_gen =  hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(300, 300)->save('upload/books/' . $name_gen);
        $save_url = 'upload/books/' . $name_gen;


        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
            'author_id' => $request->author,
        ])->categories()->attach($request->categories);



        return  redirect()->route('book.index')->with('message', 'saved successfuly');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        $author = Author::find($book->author_id);
        $authors = Author::all();

        $category = Category::find($book->category_id);

        $categorys = Category::all();
        return view('book.edit', compact('book', 'author', 'authors', 'category', 'categorys'));
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

        // validation 

        $request->validate([
            'title' => ['required', 'max:30'],
            'description' => ['required'],
            'image' => ['file','max:15360', 'mimes:png,jpg,jpeg,tif'],
            'author' => ['required'],
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'exists:categories,id', 'distinct'],
        ]);



        $book = Book::findOrFail($id);

        $old_image = $request->old_image;

        if ($request->file('image')) {
            // delete old image
            unlink($old_image);

            $image = $request->file('image');
            $name_gen =  hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/books/' . $name_gen);
            $save_url = 'upload/books/' . $name_gen;
            $book->update(['image' => $save_url]);
        }
        $book->update([
            'title' => $request->title,
            'description' =>  $request->description,
            'author_id' => $request->author,
        ]);
        $book->categories()->sync($request->get('categories'));

        return redirect()->route('book.index')->with('message', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('book.index')->with('message', 'deleted successfully');
    }
}
