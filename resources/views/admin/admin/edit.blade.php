@extends("layouts.admin")
@section("title", "المستخدمين  ")
@section("title-side")

@endsection

@section("content")
    <div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
        
        <form method='post' action='{{route("admin.updateProfilee",$user->id)}}'>
            @csrf
            @method("put")
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الاسم الاول</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل اسمك كاملاً" name="f_name" value='{{$user->f_name}}'>

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الاسم الثاني</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل اسمك كاملاً" name="l_name" value='{{$user->l_name}}'>

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">رقم الهاتف</label>
                        <div class="col-lg-6">
                            <input type="number" class="form-control m-input" placeholder="ادخل اسمك كاملاً" name="phone" value='{{$user->phone}}'>

                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الاسم الثاني</label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control m-input" placeholder="ادخل اسمك كاملاً" name="image" value='{{$user->image}}'>

                        </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الإيميل </label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control m-input" placeholder="ادخل ايميلك" name="email" value='{{ $user->email }}'>

                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">كلمة السر </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control m-input" placeholder="ادخل كلمة السر " name="password" value='{{ $user->password }}'>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">تعديل</button>
                <a class='btn btn-light' href='{{route("user.index")}}'>الغاء الأمر</a>

            </div>
        </form>
    </div>

@endsection