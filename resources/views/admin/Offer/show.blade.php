@extends("layouts.admin")

@section("title-side")
<a href="{{route("offers.create")}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة خصم جديد
        </span>
    </span>
</a>
@endsection


@section("content")

<h2 class="text-center m-5 pt-5">    الخصم: {{$offer->text }}</h2>

<div class="container d-flex justify-content-center align-items-center flex-column">
    <div class="card mb-3">
        <div class="row no-gutters" style="width:300px;height:180px; ">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center fw-bold text-decoration-underline" style="font-size: 30px;text-decoration:underline;">{{$offer->text }}</h5>
                    <p class="card-text col-8">
                        <ul>
                                    <li> تفاصيل الخصم:<br> {{ $offer->text }}</li>
                                    <li>  نسبة الخصم: <br>{{ $offer->offer_price }} </li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <p class="card-text">
                <a href='{{ route("offers.edit",$offer->id) }}' class='btn btn-sm btn-info'>تعديل</a>
                <a class='btn btn-light' href='{{route("offer.indexx")}}'>إالغاء</a>


        </p>
    </div>

</div>
@endsection
