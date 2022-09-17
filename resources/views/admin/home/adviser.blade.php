@extends("layouts.admin")

@section("title","")
@section("title-side")



@endsection


@section("content")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <form class='row mb-3'>
                <div class='col-sm-8'>
                    <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control'
                           placeholder="Enter your search ..."/>
                </div>
                <div class='col-sm-1'>
                    <button class='btn btn-primary' value='Search'><i class='fa fa-search'></i></button>
                </div>

            </form>

            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">

                        <table
                            class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
                            id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1150px;">
                            <thead>
                            <tr role="row">
                                <th>
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-group-checkable">
                                        <span></span>
                                    </label>
                                </th>
                                <th>اسم المستخدم</th>

                                <th>الايميل</th>
                                <th>رقم الهاتف</th>

                                <th>الجنس</th>
                                <th>تاريخ الميلاد</th>
                                <th>المدينة</th>
                                <th>نبذة تعريفية</th>
                                <th>الاجراءات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                {{--                                    @dd($item)--}}
                                <tr role="row" class="odd">
                                    <td width="5%" class=" dt-right" tabindex="0">
                                        <label
                                            class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox" value="" class="m-checkable">
                                            <span></span>
                                        </label>
                                    </td>

                                    <td>{{$item->user->f_name}}</td>
                                    <td>{{$item->user->email}}</td>
                                    <td>{{$item->user->phone }}</td>
                                    <td>{{$item->userInfo->gender}}</td>
                                    <td>{{$item->userInfo->date_of_birth}}</td>
                                    <td>{{$item->userInfo->city}}</td>
                                    <td>{{$item->bio}}</td>
                                    <td>
                                        <select data-aid='{{$item->id}}' name='status' class='ddlStatus form-control'>

                                        </select>

                                    </td>


                                    <td width="10%">
                                        <a href='{{ route('adviser.make', $item->id) }}'
                                           class="m-portlet__nav-link btn-primary m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                           title="accept">
                                            <i class="la la-edit"></i>
                                        </a>

                                        <a href=''
                                           class="btn-danger m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                           aria-expanded="true" title="حذف" onclick='return confirm("Are you sure?")'>
                                            <i class="flaticon-delete"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        <div class='alert alert-info'><b>نأسف</b> !لا توجد نتائج</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


