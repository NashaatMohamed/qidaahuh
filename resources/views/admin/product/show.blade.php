@extends("layouts.admin")

@section("title-side")
<a href="{{asset('admin/products/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة منتج جديد
        </span>
    </span>
</a>
@endsection


@section("content")

<h2 class="text-center m-5 pt-5">    المنتج: {{$product->title }}</h2>

<div class="container d-flex justify-content-center align-items-center flex-column">
    <div class="card mb-3" style="max-width: 640px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img class="card-img" src='{{asset("storage/assets/img/{$product->main_image}")}}'>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title }}</h5>
                    <p class="card-text">
                        <ul> 
                                    <li>الصنف: {{ $product->category->name??'' }}</li>
                                    <li> تفاصيل المنتج:<br> {{ $product->details }}</li>
                                    <li>الكمية المتوفرة: {{ $product->quantity }} </li>
                                    <li> السعر الأصلي: {{ $product->regular_price }} </li>   
                                    <li> سعر العرض: {{ $product->sale_price }}</li>                                   
                                    <li> الحالة: {{$product->active=='1'?"فعال":"غير فعال"}} </li>  
                        </ul>
                    </p>
                    
                </div>
            </div>
        </div>
    
    </div>
    <div class="">
        <p class="card-text">
                <a href='{{ route("products.edit",$product->id) }}' class='btn btn-sm btn-info'>تعديل</a>
                <a class='btn btn-light' href='{{route("products.index")}}'>إالغاء</a>
                
                
        </p>
    </div>
    
</div>
@endsection
