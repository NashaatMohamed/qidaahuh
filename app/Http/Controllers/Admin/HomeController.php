<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use DB;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    function index()
    {

        return view("admin.home.index");
    }

    public function favourite(Request $request): \Illuminate\Http\JsonResponse
    {
       
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }

        $productID = $request->input('product_id');

        
            //Check if the proudct exist or return 404 not found.
            try { $Product = Product::findOrFail($productID);} catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => 'The Product you\'re trying to add does not exist.',
                ], 404);
            }

            //check if the the same product is already in the Cart, if true update the quantity, if not create a new one.
            $Favourite = Favourite::where( ['user_id'=>$userID,'product_id' => $productID])->first();
            if ($Favourite) {
                Favourite::where(['user_id'=>$userID, 'product_id' => $productID]);
            } else {
                Favourite::create(['user_id'=>$userID, 'product_id' => $productID]);
            }

            return response()->json(['message' => 'The Favourite was updated with the given product information successfully'], 200);

       
    
    }

   
   
    public function show($id)
    {
       if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }
        // $userID = Auth::user()->id;

        $Favourite = DB::table('favourites')
        ->join('products', 'products.id', '=', 'favourites.product_id')
        ->where('favourites.user_id', '=', auth('api')->user()->getKey())
        ->select([
            'products.title',
            'products.main_image',
            'products.sale_price',
            'favourites.product_id',
            'favourites.id'
        ])
        ->get();

             return $Favourite;
        


    }
    public function destroy($id)
    {
       
        $Favourite = Favourite::where('user_id',auth('api')->user()->getKey())->where('product_id',$id)->delete();
     
        return response()->json([
            'message' => 'delete  succefully!',
            'Favourite' => $Favourite,
        ], 200); 
    }
    public function delete()
    {

        $Favourite = Favourite::where('user_id',auth('api')->user()->getKey())->delete();

       return response()->json([
        'message' => 'delete all succefully!',
        'Favourite' => $Favourite,
    ], 200); 

    }


   
}

   
 


