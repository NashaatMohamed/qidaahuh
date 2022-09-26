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