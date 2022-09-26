@extends("layouts.admin")
@section("title", "المستخدمين ")
@section("title-side")

@endsection

@section("content")


<div class="row">
    <div class="col-sm-12">

        <table
            class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
            id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1150px;">
            <thead>
            <tr role="row">
                <th>الاسم</th>
                <th>الاميل</th>
                <th>الصور</th>
            </tr>
            </thead>
            <tbody>
           
                <tr role="row" class="odd">

                    <td>{{ $users->f_name}} {{ $users->l_name}}</td>
                    <td>{{ $users->email}}</td>
                    <td>{{ $users->image}}</td>

                </tr>





@endsection
