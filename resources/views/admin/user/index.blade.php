@extends("layouts.admin")
@section("title", "المستخدمين ")


@section('title-side')
    <a href="{{ route('user.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
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
        <div class="m-portlet__body">
            <form class='row mb-3'>
                <div class='col-sm-8'>
                    <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control'
                           placeholder="Enter your search ..." />
                </div>
                <div class='col-sm-1'>
                    <button class='btn btn-primary' value='Search'><i class='fa fa-search'></i></button>
                </div>

            </form>

            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        @if($users->count()>0)
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
                                    <th>الاسم الاول</th>
                                    <th>الاسم الاخير</th>
                                    <th>الايميل</th>
                                    <th>رقم الهاتف</th>
                                    <th>الصورة الشخصية</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr role="row" class="odd">
                                        <td width="5%" class=" dt-right" tabindex="0">
                                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                <input type="checkbox" value="" class="m-checkable">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>{{ $user->f_name }}</td>
                                        <td>{{ $user->l_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td><img height=50 width= 50 src='{{asset("storage/assets/img/{$user->image}")}}' alt="picuser"></td>
                                        <td width="15%">
                                            <a href='{{ route("user.delete",$user->id) }}'
                                               class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                               aria-expanded="true" title="حذف" onclick='return confirm("Are you sure?")'>
                                                <i class="flaticon-delete"></i>
                                            </a>

                                            {{-- <a href='{{ route("user.edit",$user->id) }}'
                                                class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                aria-expanded="true" title="تعديل">
                                                 <i class="flaticon-edit"></i>
                                             </a> --}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        @else
                            <div class='alert alert-info'><b>نأسف</b> !لا توجد نتائج </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
