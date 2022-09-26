<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


    //

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Isset_;

class CartController extends Controller
{

   
    /**
     * Adds Products to the given Cart;
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return void
     */
    public function addProducts(Auth $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productID' => 'required',
            'quantity' => 'required|numeric|min:1|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }

        $productID = $request->input('productID');
        $quantity = $request->input('quantity');

        //Check if the CarKey is Valid
        // if ($cart->key == $cartKey) {
            //Check if the proudct exist or return 404 not found.
            try { $Product = Product::findOrFail($productID);} catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => 'The Product you\'re trying to add does not exist.',
                ], 404);
            }

            //check if the the same product is already in the Cart, if true update the quantity, if not create a new one.
            $cartItem = CartItem::where( ['user_id'=>$userID,'product_id' => $productID])->first();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                CartItem::where(['user_id'=>$userID, 'product_id' => $productID])->update(['quantity' => $quantity]);
            } else {
                CartItem::create(['user_id'=>$userID, 'product_id' => $productID, 'quantity' => $quantity]);
            }

            return response()->json(['message' => 'The Cart was updated with the given product information successfully'], 200);

        // } else {

        //     return response()->json([
        //         'message' => 'The CarKey you provided does not match the Cart Key for this Cart.',
        //     ], 400);
        // }

    }

    /**
     * checkout the cart Items and create and order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return void
     */
    public function checkout(Cart $cart, Request $request)
    {

        if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }

        $validator = Validator::make($request->all(), [
            // 'cartKey' => 'required',
            'name' => 'required',
            'adress' => 'required',
            'credit' => 'required',
            'expiration_year' => 'required',
            'expiration_month' => 'required',
            'cvc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }
        
        $cartItem = CartItem::where( ['user_id'=>$userID])->get();

        // $cartKey = $request->input('cartKey');
        // if ($cart->key == $cartKey) {
            $name = $request->input('name');
            $adress = $request->input('address');
            $creditCardNumber = $request->input('credit');
            $TotalPrice = (float) 0.0;
            $items = $cartItem;
            $order_status_id = $request->input('order_status_id');
            $email= $request->input('email');
           $phone =$request->input('phone');
            $mobile=$request->input('mobile');
            $city=$request->input('city');
           $text=$request->input('text');
            foreach ($items as $item) {

                $product = Product::find($item->product_id);
                $price = $product->sale_price;
                $inStock = $product->quantity;
                if ($inStock >= $item->quantity) {

                    $TotalPrice = $TotalPrice + ($price * $item->quantity);

                    $product->quantity = $product->quantity - $item->quantity;

                    $product->save();

                } else {
                    return response()->json([
                        'message' => 'The quantity you\'re ordering of ' . $item->title .
                        ' isn\'t available in stock, only ' . $inStock . ' units are in Stock, please update your cart to proceed',
                    ], 400);
                }
            }

            /**
             * Credit Card information should be sent to a payment gateway for processing and validation,
             * the response should be dealt with here, but since this is a dummy project we'll
             * just assume that the information is sent and the payment process was done succefully,
             */

            $PaymentGatewayResponse = true;
            $transactionID = md5(uniqid(rand(), true));
            if (Auth::guard('api')->check()) {
                $ID = auth('api')->user()->getKey();

            }
            if ($PaymentGatewayResponse) {

                $cartItem = CartItem::where( ['user_id'=>$ID])->get();

               
                if($cartItem->isEmpty()){
                  return response()->json([
                            'message' => 'CartItem is empety you shoud Add to Cart first.',
                        ], 400);
                        


                    
                }else {
                    $items = CartItem::where( ['user_id'=>$userID])->get();
                   
                    $skus= count($items);
                 $order = Order::create([
                    'total_items' => $skus,
                    'total_price' => $TotalPrice,
                    'name' => $name,
                    'user_info_id' =>$ID,
                    'transactionID' => $transactionID,
                    'order_status_id' => $order_status_id,
                    'email' => $email,
                    'phone' => $phone,
                    'mobile' => $mobile,
                    'city' => $city,
                    'address' => $adress ,
                    'text' => $text
                 ]);                    
                 $items = CartItem::where( ['user_id'=>$userID])->get();
                    foreach ($items as $item) {
$product = Product::find($item->product_id);
$price = $product->sale_price;
$productID= $product->id;
                 $OrderDetail = OrderDetail::create([
                    'order_id' =>$order->id,
                    'product_id'=>$productID,
                   'price'=>$price,
                  'quantity'=>$item->quantity,
                   'total_price' =>$order->total_price

                 ]);
                }
                 $cartItem = CartItem::where( ['user_id'=>$userID]);
                 $cartItem->delete();
                 return response()->json([
                    'message' => 'you\'re order has been completed succefully, thanks for shopping with us!',
                    'orderID' => $order->getKey(),
                 ], 200);
                }
            }
            
          

    }
    
    public function show($id)
    {
       if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }
        // $userID = Auth::user()->id;

        $CartItemm = DB::table('cart_items')
        ->join('products', 'products.id', '=', 'cart_items.product_id')
        ->where('cart_items.user_id', '=', auth('api')->user()->getKey())
        ->select([
            'products.title',
            'products.main_image',
            'products.sale_price',
            'products.quantity',
            'cart_items.quantity',
            'cart_items.product_id',
            'cart_items.id'
        ])
        ->get();

             return $CartItemm;
        


    }
    public function destroy($id)
    {

        $CartItem = CartItem::where('user_id',auth('api')->user()->getKey())->where('product_id',$id)->delete();
     
        return response()->json([
            'message' => 'delete  succefully!',
            'CartItem' => $CartItem,
        ], 200); 
    }
    public function delete()
    {

        $CartItem = CartItem::where('user_id',auth('api')->user()->getKey())->delete();

       return response()->json([
        'message' => 'delete all succefully!',
        'CartItem' => $CartItem,
    ], 200); 

    }

}