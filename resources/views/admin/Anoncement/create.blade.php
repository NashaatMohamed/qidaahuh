@extends("layouts.admin")
@section("title","اضافة اعلان جديد")

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form enctype="multipart/form-data" method='post' action='{{route("Anoncement.store")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">محتوى الاعلان</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل محتوى الاعلان" name="text">
                        </div>
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
                            <a href='{{route("Anoncement.index")}}' class="btn btn-secondary">الغاء الامر</a>
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
