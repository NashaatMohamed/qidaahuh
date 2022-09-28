@extends("layouts.admin")
@section("title","اضافة مستخدم جديد")

 @section("title-side")
    <a href="{{asset('admin/category/create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة مستخدم جديد
        </span>
    </span>
</a>
@endsection

@section("content")

    <div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
        <form method="post" action="{{route('user.store')}}">
            @csrf
            <div class='m-form'>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">الاول</label>
                            <div class="col-lg-6">
                                <input type="text" name="f_name"  class="form-control m-input" placeholder="ادخل الاسم الاول ">
                                <span class="m-form__help">أدخل اسم السمتخدم</span>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label"> الاسم الثانى</label>
                            <div class="col-lg-6">
                                <input type="text" name="l_name"  class="form-control m-input" placeholder="ادخل الاسم الثانى">
                                <span class="m-form__help">أدخل اسم السمتخدم</span>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">رقم الهاتف</label>
                            <div class="col-lg-6">
                                <input type="text" name="phone"  class="form-control m-input" placeholder="ادخل رقم الهاتف ">
                                <span class="m-form__help">أدخل رقم الهاتف</span>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">الايميل</label>
                            <div class="col-lg-6">
                                <input type="text" name="email"  class="form-control m-input" placeholder="ادخل الايميل " autocomplete="off">
                                <span class="m-form__help">أدخل الايميل</span>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">الباسورد</label>
                            <div class="col-lg-6">
                                <input type="password" name="password"  class="form-control m-input" placeholder="ادخل الباسورد" autocomplete="new-password" >
                                <span class="m-form__help">أدخل الباسورد</span>
                            </div>
                        </div>

                        <div class="m-form__group form-group row">
                            <label class="col-lg-3 col-form-label" for="details">الصورة المستخدم</label>
                            <input class="col-lg-6" type='file' name="image" id="image" />
                    </div>



                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">اضافة</button>
                                <a href="{{route('user.index')}}" class="btn btn-secondary">الغاء الامر</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
