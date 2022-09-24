<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderDetail;
use App\Models\Product;
class OrderController extends Controller
{
    public function index()
    {
       $orders = Order::paginate(8);

       $status= OrderStatus::all();
       return view("admin.order.index",compact('orders','status'));
    }
    public function show($id)
    {
        $order = Order::find($id);
       
        return view("admin.order.show",compact('order'));
    }

    public function destroy($id)
    {
        $item= Order::find($id);
        $item->delete();
        Session::flash("msg","تم حذف الطلب' بنجاح");
        return redirect (route("order.index"));
    }


}
