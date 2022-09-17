<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\EditRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    function index(Request $request){

        $q=$request->q;

         $active=$request->active;
         $items=Category::whereRaw("true");

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
        return view("admin.category.index")->with("items",$items);
    }
    function create(){
      //  dd("fddfdsfsd");
        return view("admin.category.create");
    }

    public function store(CreateRequest $request)
    {
        $data=$request->all();
      // dd($data);

        Category::create($data);
        Session::flash("msg","تم اضافة التصنيف بنجاح");

         return redirect (route("category.index"));
    }

    public function destroy($id)
    {
        $item= Category::find($id);
        $item->delete();
        Session::flash("msg","تم حذف التصنيف بنجاح");
        return redirect (route("category.index"));
    }


    public function edit($id)
    {
      $item= Category::find($id);
        if(!$item)
        {
            session()->flash("msg","Invalid ID");
            return redirect(route("category.index"));

        }
        return view("admin.category.edit",compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {

          $item=Category::find($id);
          $data=$request->all();
          if($request['active']==1){
            $data['active']=1;
          }
          else{
            $data['active']=0;
          }
         // $data['active']=isset($request['active'])?1:0;
           // dd($data);
          $item->update($data);

         Session::flash("msg"," تم التعديل بنجاح");

          return redirect (route("category.index"));
    }

    public function show($id)
    {

       $item= Category::find($id);
      // dd($item);
        if(!$item)
        {
            session()->flash("msg","Invalid ID");
            return redirect(route("category.index"));
        }

        return view("admin.category.show",compact('item'));
    }
}

