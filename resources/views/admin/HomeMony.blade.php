@extends("layouts.admin")
@section("title","الصفحة الرئيسية")
@section("content")

<div class="row container">
<div class="card col-3 m-4" style="height:170px " >
    <h5 class="card-title mt-5"> اجمالي المبيعات</h5>
    <div class="card-body mt-2">
        <div class="square" style=" 60px;height: 60px;display: inline-block;">
            <img src="{{asset('assets/images/mony.png')}}" class="m-3" width="75px">
          </div>
                <Span class="card-text m-4 fs-1 fw-bold">{{empty($skus)?"لايوجد":$skus}} .ج.م</span>
    </div>
  </div>

  <div class="card col-3 m-4" style="height:170px ">
    <h5 class="card-title mt-5">أجمالي  الطلبات</h5>
    <div class="card-body">
        <div class="square" style="background-color:#3798d4;width: 60px;height: 60px;display: inline-block;">
            <img src="{{asset('assets/images/card.png')}}" class="m-3" width="35px">
          </div>
                    <Span class="card-text m-4 fs-1 fw-bold">{{empty($allOrder)?"لايوجد":$allOrder}}</span>
    </div>
  </div>



  <div class="card col-3 m-4" style="height:170px ">
    <h5 class="card-title mt-5">أجمالي العملاء</h5>
    <div class="card-body">
        <div class="square" style="width: 60px;height: 60px;display: inline-block;">
            <img src="{{asset('assets/images/user.png')}}" class="m-3" width="80px">
        </div>
                <Span class="card-text m-4 fs-1 p-5 fw-bold">{{empty($userOrder)?"لايوجد":$userOrder}}</span>
    </div>
  </div>


    <div class="card col-3 m-4" style="height:170px " >
        <h5 class="card-title mt-5">اجمالى المنتجات</h5>
        <div class="card-body mt-2">
            <div class="square" style="background-color:#3399dc;width: 60px;height: 60px;display: inline-block;">
                <img src="{{asset('assets/images/card.png')}}" class="m-3" width="35px">
              </div>
                        <Span class="card-text m-4 fs-1 fw-bold">{{empty($allProducts)?"لايوجد":$allProducts}}</span>
        </div>
      </div>

      <div class="card col-3 m-4" style="height:170px " >
        <h5 class="card-title mt-5">اجمالى الاقسام </h5>
        <div class="card-body mt-2">
            <div class="square" style="background-color:#3399dc;width: 60px;height: 60px;display: inline-block;">
                <img src="{{asset('assets/images/card.png')}}" class="m-3" width="35px">
              </div>
                        <Span class="card-text m-4 fs-1 fw-bold">{{empty($category)?"لايوجد":$category}}</span>
        </div>
      </div>
      <div class="card col-3 m-4" style="height:170px " >
        <h5 class="card-title mt-5">اجمالى الخصومات </h5>
        <div class="card-body mt-2">
            <div class="square" style="background-color:#3399dc;width: 60px;height: 60px;display: inline-block;">
                <img src="{{asset('assets/images/card.png')}}" class="m-3" width="35px">
              </div>
                        <Span class="card-text m-4 fs-1 fw-bold">{{empty($offers)?"لايوجد":$offers}}</span>
        </div>
      </div>
</div>

<div class="row container-fluid justify-content-end">
    <div style="width: 400px;height:400px" class="bg-white ms-4">
        <div class="m-4">
            <img src="{{asset('assets/images/card.png')}}" width="20px" style="float: right;">
            <h3 style="text-align: end;display: inline-block;float: right;margin-top:0;">احدث الطلبات</h3>
        </div>
            <div style="float: right;margin: 26px;text-align: center;margin-right:80px;">
                <table>
                    <th style="padding-left:20px">اسم الطلب</th>
                    <th style="padding-left:20px">السعر الكامل</th>
                    <th style="padding-left:20px">الكميه</th>
                    @foreach ($recentOrders as $recentOrder )
                    <tr>
                    <td style="font-weight:bold;">{{$recentOrder->name}}</td>
                    <td style="font-weight:bold;">{{$recentOrder->total_price}}</td>
                    <td style="font-weight:bold;">{{$recentOrder->total_items}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
</div>



@endsection

@section("css")
<link rel="stylesheet" href="{{asset('chosen/chosen.css')}}">
@endsection
@section("js")
<script src="{{asset('chosen/chosen.jquery.js')}}" type="text/javascript"></script>
<script>
    $(function(){
        $(".select").chosen();
    })
</script>
@endsection
