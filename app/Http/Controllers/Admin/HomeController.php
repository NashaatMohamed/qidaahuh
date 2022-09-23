<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;

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


    public function Anoncment_product_data(){
        $annoncment = Announcement::select("text","image")->get();
        $product = Product::whereNull("offer_id")->where("active",1)
        ->select("title","slug","details","main_image","images","regular_price","sale_price","quantity")->get();

        return response()->json(["allAnoncement" => $annoncment,"AllProduct" => $product]);
    }

}
