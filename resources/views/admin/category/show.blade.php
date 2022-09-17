@extends("layouts.admin")
@section("title","عرض التصنيف")

@section("title-side")
<!--a href="{{asset('admin/category/create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة تصنيف جديد
        </span>
    </span>
</a-->
@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
       
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الاسم</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="name" value="{{$item->name}}" class="form-control m-input" placeholder="ادخل الاسم ">
                        </div>
                    </div>


                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label">فعال / غير فعال</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input disabled {{$item->active=='1'?"checked":""}} type="radio" name="active" checked="" value="1"
                                    aria-describedby="account_group-error"> فعال
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input disabled {{$item->active=='0'?"checked":""}} type="radio" name="active" value="0"> غير فعال
                                <span></span>
                            </label>
                        </div>
                        <span class="m-form__help"></span>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">آخر تحديث</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="name" value="{{$item->updated_at}}" class="form-control m-input" placeholder="ادخل الاسم ">
                        </div>
                    </div>

                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <a href="{{asset('admin/category')}}" class="btn btn-secondary">الغاء الامر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection