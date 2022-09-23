<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
       $userOrders = Order::where('user_info_id', auth()->id())->get();
       return $userOrders;
    }
    public function show(Order $order)
    {
        if($order->user_info_id == auth()->id()){
             return $order;
         }else{
            return response()->json([
                'message' => 'The order you\'re trying to view doesn\'t seem to be yours, hmmmm.',
            ], 403);
         }

    }}
