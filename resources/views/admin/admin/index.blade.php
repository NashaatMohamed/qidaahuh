@extends("layouts.admin")
@section("title", "Admin ")
@section("title-side")

@endsection

@section("content")
    <div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
        
        @foreach($users as $user)

            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> الصوره</label>
                        <div class="col-lg-6">
                            <img height=180 width= 180 src='{{asset('assets/' . $user->image)}}' alt="picAdmin">
                        </div>
                    </div>



                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الاسم الاول</label>
                        <div class="col-lg-6">
                    {{$user->f_name}}

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الاسم الثاني</label>
                        <div class="col-lg-6">
                 {{$user->l_name}}

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">رقم الهاتف</label>
                        <div class="col-lg-6">
                    {{$user->phone}}

                        </div>
                    </div>
                    

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">الإيميل </label>
                        <div class="col-lg-6">
                            {{ $user->email }}

                        </div>
                    </div>
                   
                </div>
                 <a href='{{ route("user.edit",$user->id) }}'
                    class='btn btn-sm btn-info'     class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                aria-expanded="true" title="تعديل">
                                            تعديل </a>

         </div> 
                  @endforeach 

    </div>

@endsection