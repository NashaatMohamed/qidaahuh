@extends("layouts.admin")

@section("title-side")
<a href="{{route('products.create')}}"
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
    <div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">


            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> الصوره</label>
                        <div class="col-lg-6">
               <img class="card-img" height=180 width= 180  src='{{ asset("storage/assets/img/{$product->main_image}") }}'>

                        </div>
                    </div>



                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">المنتج:</label>
                        <div class="col-lg-6">
                            {{$product->title }}
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الصنف:</label>
                        <div class="col-lg-6">
                            {{ $product->subCategory->sub_name??'' }}

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> تفاصيل المنتج:</label>
                        <div class="col-lg-6">
                            {{ $product->details }}
                        </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الكمية المتوفرة:</label>
                        <div class="col-lg-6">
                            {{ $product->quantity }}
                        </div>
                    </div>



                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">السعر الأصلي:</label>
                        <div class="col-lg-6">
                            {{ $product->regular_price }}                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">سعر العرض:</label>
                        <div class="col-lg-6">
                            {{ $product->sale_price }}
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> الحالة:</label>
                        <div class="col-lg-6">
                            {{$product->active=='1'?"فعال":"غير فعال"}}
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


    </div>

    @endsection
