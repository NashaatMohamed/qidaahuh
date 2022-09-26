<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Product;
use Validator;
use DB;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all product that have offers


        // one Statment
        // $allproduct = Product::with(["offer" =>function($query){
        //     $query->select("text","id","offer_price");
        // }])->whereNotNull("offer_id")->get();

            // another Statment

        // $allproduct = Product::with("offer:text,id,offer_price")->whereNotNull("offer_id")->get();


        $allproducts = DB::table('products')
        ->join("offers","products.offer_id" , "=", "offers.id")
        ->select("offers.text","offers.offer_price","products.sale_price","products.regular_price")->get()->toArray();

        // return $allproducts;

        foreach( $allproducts as $allproduct){
            $allproduct->sale_price = $allproduct->regular_price - ($allproduct->offer_price/100 * $allproduct->regular_price);
            $allproduct->sale_price->save();
        }


        return $allproduct;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'offer_price' => "numeric|required",
        ]);

        if($validated->fails())
        return response()->json($validated->errors());

        Offer::create($request->all());

        return response()->json("Offer added succefully");
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
        //
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

        $offer = Offer::find($id);
        $validated = Validator::make($request->all(),[
            'offer_price' => "numeric|required",
        ]);

        if($validated->fails())
        return response()->json($validated->errors());

        $offer::update($request->all());

        return response()->json("Offer updated succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);

        $offer->delete();
    }
}
