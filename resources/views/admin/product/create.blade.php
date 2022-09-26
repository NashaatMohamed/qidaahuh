@extends("layouts.admin")
@section("title","اضافة منتج جديد")

@section("content")
<div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
    @foreach ($errors->all() as $error)
                <li class="text-danger m-5">{{ $error }}</li>
            @endforeach
    <form enctype="multipart/form-data" method='post' action='{{route("products.store")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">اسم المنتج </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل اسم المنتج" name="title">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الوصف </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل الوصف " name="slug">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">القسم الفرعي </label>
                        <div class="col-lg-6">
                            <select class="form-control chosen-rtl select" name='subcategory_id' id='subcategory_id'>
                                <option selected>-اختر القسم الفرعي- </option>
                                @foreach($SubCategory as $subCat)
                                <option value='{{$subCat->id}}'>
                                    {{$subCat->sub_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">القسم الخصم </label>
                        <div class="col-lg-6">
                            <select class="form-control chosen-rtl select" name='offer_id' id='offer_id'>
                                <option selected>-اختر  الخصم- </option>
                                <option>لايوجد خصم</option>
                                @foreach($offers as $offer)
                                <option value='{{$offer->id}}'>
                                    {{$offer->offer_price}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label" for="details">تفاصيل المنتج</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" id="details" name="details" rows="3"></textarea>


                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">السعر العادي </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل السعر "
                                name="regular_price">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">سعر الخصم </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل سعر الخصم "
                                name="sale_price">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الكمية المتوفرة</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                placeholder="ادخل الكمية المتوفرة من المنتج " name="quantity">
                        </div>
                    </div>
                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label">الحالة</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active')=='1'?"checked":""}} type="radio" name="active" checked=""
                                    value="1" aria-describedby="account_group-error"> فعال
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active')=='0'?"checked":""}} type="radio" name="active" value="0"> غير
                                فعال
                                <span></span>
                            </label>
                        </div>
                        <span class="m-form__help"></span>
                    </div>

                    <div class="m-form__group form-group row">
                            <label class="col-lg-3 col-form-label" for="details">الصورة الرئيسية</label>
                            <input class="col-lg-6" type='file' name="image" id="image" />
                    </div>

                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3">
                           </div>
                        <div class="col-lg-6">

                            <button class="btn btn-primary" type="submit">إضافة</button>
                            
                            <a href='{{route("products.indexx")}}' class="btn btn-secondary">الغاء الامر</a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
