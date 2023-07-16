<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories =  Category::all();
       
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $data = $request->all();
     
        $request->validate([
        'name' => ['required','max:20','unique:categories'],
        'description' => 'required',
    ]);
       
        Category::create([
            'name' =>$data['name'],
            'description'=>$data['description'],
        ]);

        return redirect()->route('category.index')->with('message','save successfully');
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
       $cat_id =  Category::find($id);
    
        return view('category.edit',compact('cat_id'));
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
       
        $cat_data = Category::find($id);
        
   //  dd($cat_data->name);
   //dd($request);
        $request->validate([
           
        'name' => ['required','max:20', Rule::unique('categories')->ignore($cat_data->id, 'id')],
        'description' => 'required',
    ]);
       
       
            $cat_data->name = $request->name;
            $cat_data->description= $request->description;

            $cat_data->save();                

        return redirect()->route('category.index')->with('message','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
     
        $cat_id = Category::find($id);
       
        $cat_id->delete();
        return redirect()->route('category.index')->with('message','deleted successfully');

    }
}
