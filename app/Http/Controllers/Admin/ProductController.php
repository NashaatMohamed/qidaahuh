<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use DB;
use Session;
use App\Models\SubCategory;
use App\Models\category;
use App\Models\Product;
use App\Models\Offer;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\products\ProdRequest;
use App\Http\Requests\products\ProdRequestEdit;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function activate($id){
        //sleep(3);
        $item = Product::find($id);
        if($item){
            $item->active=!$item->active;
            $item->save();
            return response()->json(['status'=>1,'msg'=>'updated successfully']);
        }
        return response()->json(['status'=>0,'msg'=>'invalid id']);
    }
   public function indexxx(Request $request)
        {
            $q = $request->q;
            $subcategories = $request->subcategories;
            $active = $request->active;
            $skus = OrderDetail::selectRaw('COUNT(*)')
            ->whereColumn('product_id','products.id')
            ->getQuery();

        $query = Product::select('*')
            ->selectSub($skus, 'skus_count')
            ->orderBy('skus_count', 'DESC')->get() ;
            if($active!=''){
                $query->where('active',$active);
            }

            if($subcategories){
                $query->where('subcategory_id',$subcategories);
            }

            if($q){
                $query->whereRaw('(title like ? or slug like ?)',["%$q%","%$q%"]);
            }


            $products = $query;


            $subcategories = SubCategory::all();
            return response()->json(['status' => 200, 'item' =>  $products,  $subcategories ]);

        }

        public function indexx(Request $request)
        {
            $q = $request->q;
            $subcategory = $request->subcategory;
            $active = $request->active;
            $skus = OrderDetail::selectRaw('COUNT(*)')
            ->whereColumn('product_id','products.id')
            ->getQuery();

        $query = Product::select('*')
            ->selectSub($skus, 'skus_count')
            ->orderBy('skus_count', 'DESC')->get() ;
            if($active!=''){
                $query->where('active',$active);
            }

            if($subcategory){
                $query->where('subcategory_id',$subcategory);
            }

            if($q){
                // $query->whereRaw('(title like ? or slug like ?)',["%$q%","%$q%"]);
                //  return $q;
                $query->where("title","LIKE","%$q%");
            }


            $products = $query;

            $subcategories = SubCategory::all();
            $categories = category::all();

            // $product = Product::find(15)->subCategory->sub_name;
            // return $product;
                return view("admin.product.index",compact(['products','subcategories','categories']));
        }
         /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Category::all();

        $SubCategory = SubCategory::all();
        $offers = Offer::all();
        return view("admin.product.create",compact(['SubCategory','offers','Category']));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$validated = $request->validate([


            "title" => "required",
            'quantity'=>"required",
            'regular_price'=>"required",
            'details'=>"required",
            'slug' =>"required",
            'subcategory_id' =>"required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"

        ]);
        $fileName = $request->image->store("public/assets/img");
        $imageName = $request->image->hashName();

        $requestData = $request->all();
        $requestData['main_image'] = $imageName;
        $requestData['images'] = "1";

        if($requestData["offer_id"]=="???????????? ??????"){
            $requestData["offer_id"] = NULL;
        }

        // return $requestData;

        if ($requestData["offer_id"] !=NULL){
            $myoffer = Offer::where("id",$requestData["offer_id"])->select("offer_price")->first();
            $requestData["sale_price"] =  $requestData["regular_price"] - ($myoffer['offer_price']/100 * $requestData["regular_price"]);
        }else{
            $requestData["sale_price"] = $requestData["regular_price"];
        }
        $product = Product::create($requestData);
        Session::flash("msg","s: ?????? ?????????????? ??????????");

        return redirect()->route('products.indexx');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        if(!$product){
            session()->flash("msg","w: ?????????????? ?????? ????????");
            return redirect(route("products.index"));
        }
        return view("admin.product.show",compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        if(!$product){
            session()->flash("msg","e:?????????????? ?????? ????????");
            return redirect(route("products.index"));
        }
        // return $product;
        $Category = Category::all();

        $SubCategories = SubCategory::all();
        // return $SubCategories;
        $offers = Offer::all();
        return view("admin.product.edit",compact('product','SubCategories','offers','Category'));
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
        $productDB = product::find($id);
        $request['slug'] = Str::slug($request['title']);
        $request['images'] = "2";
        if($request['main_image']){
            $requestData = $request->all();
            $fileName = $request->main_image->store("public/assets/img");
            $imageName = $request->main_image->hashName();
            $requestData['main_image'] = $imageName;
            $productDB->update($requestData);
        }
        else{

            product::where('id', $id)->update(array('title' => $request['title'],
                                                     'quantity'=> $request['quantity'],
                                                     'regular_price'=> $request['regular_price'],
                                                     'sale_price'=> $request['sale_price'],
                                                     'details'=> $request['details'],
                                                     'slug'=> $request['slug'],
                                                     'active'=> $request['active'],
                                                     'subcategory_id'=>$request['subcategory_id']
                                                    ));
        }


        session()->flash("msg","s:???? ?????????? ???????????? ??????????");
        return redirect(route("products.indexx"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("products")->where("id",$id)->delete();
        session()->flash("msg","w:???? ?????? ???????????? ??????????");
        return redirect(route("products.indexx"));
    }

    public function searchproduct($title){
        $result  = Product::where("title" , "like","%$title%")
        ->orWhere("slug" , "like" ,"%$title%")
        ->orWhere("details" , "like" ,"%$title%")
        ->orWhere("regular_price" , "like" ,"%$title%")
        ->orWhere("sale_price" , "like" ,"%$title%")
        ->orderBy("id","DESC")
        ->get();
        if(count($result)){
             return response()->json($result);
        }else{
            return response()->json(["result" => "this product not Found"],404);
        }
    }


    public function index(Request $request)
    {
        $q = $request->q;
        $category = $request->category;
        $active = $request->active;



        // $query = product::whereRaw('true') ;

        $skus = OrderDetail::selectRaw('COUNT(*)')
        ->whereColumn('product_id','products.id')
        ->getQuery();

    $query = Product::select('*')
        ->selectSub($skus, 'skus_count')
        ->orderBy('skus_count', 'DESC') ;
        if($active!=''){
            $query->where('active',$active);
        }

        if($category){
            $query->where('category_id',$category);
        }

        if($q){
            $query->whereRaw('(title like ? or slug like ?)',["%$q%","%$q%"]);
        }


        $products = $query->paginate(8)
            ->appends([
                'q'     =>$q,
                'category'=>$category,
                'active'=>$active
            ]);

        $categories = category::all();

        return view ('admin.product.index',['products'=>$products,'categories'=> $categories]);

    }

}
