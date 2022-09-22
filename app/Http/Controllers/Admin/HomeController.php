<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favourite;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index()
    {

        return view("admin.home.index");
    }

    public function favourite(Request $request): \Illuminate\Http\JsonResponse
    {
        $request = $request->input('product_id');
        if (!$request == Product::find($request)) {
            $data = [
                'status' => false,
                'statusCode' => 422,
                'message' => 'There is no Product has this id',
                'items' => '',

            ];

            return response()->json($data);
        }
       


        $favourites = Favourite::create([
            'product_id' => $request,
            'user_id' => Auth::user()->id,
        ]);

        $data = [
            'status' => true,
            'statusCode' => 200,
            'message' => 'product has been added to your favorites',
            'items' => $favourites,

        ];

        return response()->json($data);
    }

   
    public function show(Favourite $Favourite)
    {
        if($Favourite->user_id == Auth::user()->id){
             return $Favourite;
         }else{
            return response()->json([
                'message' => 'The Favourite you\'re trying to view doesn\'t seem to be yours, .',
            ], 403);
         }

    }
}

   
 
// $CartItemm = DB::table('cart_items')
// ->join('products', 'products.id', '=', 'cart_items.product_id')
// ->where('cart_items.user_id', '=', Auth::user()->id)
// ->select([
//     'products.title',
//     'products.main_image',
//     'products.sale_price',
//     'cart_items.quantity',
//     'cart_items.id'
// ])
// ->get();

//      return $CartItemm;

