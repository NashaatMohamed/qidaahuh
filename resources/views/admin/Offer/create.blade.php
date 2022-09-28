@extends("layouts.admin")
@section("title","اضافة خصم جديد")

@section("content")
<div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
    @foreach ($errors->all() as $error)
                <li class="text-danger m-5">{{ $error }}</li>
            @endforeach
    <form enctype="multipart/form-data" method='post' action='{{route("offers.store")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">



                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label" for="text">تفاصيل الخصم</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" id="text" name="text" rows="3"></textarea>


                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> نسبة الخصم </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="ادخل نسبة الخصم "
                                name="offer_price">
                        </div>
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

                            <a href='{{route("offer.indexx")}}' class="btn btn-secondary">الغاء الامر</a>

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
