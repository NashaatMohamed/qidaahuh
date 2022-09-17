@extends("layouts.admin")
@section("title","اضافة منتج جديد")

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form enctype="multipart/form-data" method='post' action='{{route("products.index")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">اسم المنتج </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل اسم المنتج" name="title"
                                value='{{ old("title") }}'>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الوصف </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل الوصف " name="slug"
                                value='{{ old("slug") }}'>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الصنف </label>
                        <div class="col-lg-6">
                            <select class="form-control chosen-rtl select" name='category_id' id='category_id'>
                                <option selected>-اختر الصنف- </option>
                                @foreach($categories as $category)
                                <option {{old('category_id')==$category->id?'selected':''}} value='{{$category->id}}'>
                                    {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label" for="details">تفاصيل المنتج</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" id="details" name="details" rows="3">{{ old("details") }}</textarea>
                    
                        
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">السعر العادي </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل السعر "
                                name="regular_price" value='{{ old("regular_price") }}'>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">سعر الخصم </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل سعر الخصم "
                                name="sale_price" value='{{ old("sale_price") }}'>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الكمية المتوفرة</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                placeholder="ادخل الكمية المتوفرة من المنتج " name="quantity"
                                value='{{ old("quantity") }}'>
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
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary" type="submit">إضافة</button>
                            <a href='{{route("products.index")}}' class="btn btn-secondary">الغاء الامر</a>
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
