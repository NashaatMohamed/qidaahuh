<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use App\Models\subcategory;
use App\Models\Product;
class SubbCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index(Request $request){

        $q=$request->q;

         $active=$request->active;
         $items=SubCategory::whereRaw("true");

         if($active)
         {
             $items->where("active",$active);
         }
         if($active=="0")
         {

             $items->where("active",$active);
         }
         if($q)
         {
             $items->whereRaw('(name like ? )',["%$q%"]);
         }


       // dd($active);

         $items=$items->paginate(10)
         ->appends([
             'q'=>$q,
             'active'=>$active
         ]);


       // $items=Category::Paginate(10);
       // dd($items);
        return view("admin.subcategory.index")->with("items",$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create(){
       
$category=Category::all();

        return view("admin.subcategory.create",compact('category'));
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

        $validated = $request->validate([
        'sub_name' => "required|unique:sub_categories,sub_name",
        'photo' => 'required',
        'category_id' => 'required|numeric|exists:categories,id'
    ]);

    if($validated)


        $subcategory = subcategory::create([
            'sub_name' =>$request->sub_name,
            'photo' => $request->photo,
            'category_id' => $request->category_id,
            'active'=>$request->active
        ]);

         $subcategory->save();
         return redirect()->route('sub_category.index');

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

    public function get_product_category_subcategory($CategoryID,$SubcategoryID){

        $category = Category::find($CategoryID);
        $subcategory = subcategory::where('category_id',$category->id)->get();
        $specificSub = $subcategory->find($SubcategoryID);
        $product = Product::where("subcategory_id",$specificSub->id)
        ->where("active",1)->whereNull("offer_id")->get();
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item= subcategory::find($id);
        if(!$item)
        {
            session()->flash("msg","Invalid ID");
            return redirect(route("category.index"));

        }
        return view("admin.subcategory.edit",compact('item'));
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
