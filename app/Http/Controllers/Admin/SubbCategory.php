<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use App\Models\subcategory;
class SubbCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::select("id")->get();

        $validated = Validator::make($request->all(),[
        'sub_name' => "required|unique:sub_categories,sub_name",
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|numeric|exists:categories,id'
    ]);

    if($validated->fails())

     return response()->json($validated->errors());

        $filename = '';
        $filename = uploadImage("subcategory",$request->photo);

        $subcategory = subcategory::create([
            'sub_name' =>$request->sub_name,
            'photo' => $filename,
            'category_id' => $request->category_id
        ]);

        return $subcategory;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        
        $subcategory = subcategory::where('category_id',$category->id)->get();

        return $subcategory;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
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
        $subcategory = subcategory::find($id);

        $validated = Validator::make($request->all(),[
            'sub_name' => "required",
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);

        if($validated->fails())

         return response()->json($validated->errors());

                    $subcategory->sub_name = $request->sub_name;
                    $subcategory->category_id = $request->category_id;

                    if($request->has('photo'))
                    $filename = uploadImage("subcategory",$request->photo);

                    $subcategory->photo = $filename;
                    $subcategory->update();
            return $subcategory;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = subCategory::find($id);
        if(!$subcategory)
        return response()->json("the subCategory is not found");

        $subcategory->delete();
         return response()->json("the subCategory is deleted");
    }
}
