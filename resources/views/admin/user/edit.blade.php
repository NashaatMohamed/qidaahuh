@extends("layouts.admin")
@section("title", "المستخدمين  ")
@section("title-side")

@endsection

@section("content")
<<<<<<< HEAD
    <div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
        <form method='post' action='{{route("user.update",$item->id)}}'>
=======
    <div class="m-portlet m-portlet--mobile">
        <form method='post' action='{{route("user.update",$user->id)}}'>
>>>>>>> b55d2a2e76d1787af21cf6fec53adddc639bf3d0
            @csrf
            @method("put")
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الاسم الاول</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل اسمك كاملاً" name="name" value='{{$user->name}}'>

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
