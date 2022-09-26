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
    public function index(Request $request)
    {

        $q = $request->q;
        $category = $request->id;
        $active = $request->order_status_id;

        $query = Order::whereRaw('true') ;


      

       if($active!=''){
        $query->where('id',$active);
    }

    if($category){
        $query->where('order_status_id',$category);
    }

    if($q){
        $query->whereRaw('(name like ? or city like ?)',["%$q%","%$q%"]);
    }
    $orders =$query ->paginate(8) ->appends([
        'q'     =>$q,
        'category'=>$category,
        'active'=>$active
    ]);

       $status= OrderStatus::all();
       return view("admin.order.index", compact('orders','status')); 
    }
    public function show($id)
    {
        $order = Order::find($id);
               $orderStatuses=  OrderStatus::all();

        return view("admin.order.show",compact('order','orderStatuses'));
    }

    public function destroy($id)
    {
        $item= Order::find($id);
        $item->delete();
        Session::flash("msg","تم حذف الطلب' بنجاح");
        return redirect (route("order.index"));
    }



    public function updateStatus(Request $request, $id){

        $orderDB = order::find($id);
        
        $orderDB->order_status_id = $request->status;
        $orderDB->update();

        session()->flash("msg","s:تم تعديل الطلب بنجاح");
        return redirect(route("order.index"));



    }


   
}
