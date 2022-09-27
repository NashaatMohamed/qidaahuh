@extends("layouts.admin")
@section("title","ادارة التصنيفات")

@section("title-side")
<a href="{{asset('admin/sub_category/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة تصنيف جديد
        </span>
    </span>
</a>
@endsection

@section("content")
<div class="m-portlet m-portlet--mobile col-md-12 col-sm-12 col-lg-12 col-auto">
    <div class="m-portlet__body">
        <form>
            <div class='row mb-3'>
                <div class='col-sm-8'>
                    <input type='text' value="{{request()->q}}" name="q" class='form-control'
                        placeholder='أدخل كلمة البحث هنا' />
                </div>
                <div class='col-sm-3'>
                    <select name="active" class='form-control'>
                        <option value=''>الحالة</option>
                        <option value='1'>فعال</option>
                        <option value='0'>غير فعال</option>
                    </select>
                </div>
                <div class='col-sm-1 text-right'>
                    <button type="submit" class='btn btn-primary'><i class='fa fa-search'></i></button>
                </div>
            </div>
        </form>
        <!--begin: Datatable -->
        @if($items->count()>0)
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th width='10%'>
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-group-checkable">
                                        <span></span>
                                    </label>
                                </th>
                                <th>الاسم</th>
                                <th  width='10%'>الحالة</th>

                                <th width='15%'>
                                    اخر تحديث</th>

                                <th width='15%'>خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr role="row" class="odd">
                                <td >
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{$item->sub_name}}</td>
                                <td>{{$item->active==0?'غير فعال':' فعال'}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>


                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('sub_category.show',$item->id)}}" title="عرض"><i
                                            class="la la-eye"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('sub_category.edit',$item->id)}}" title="تعديل"><i
                                            class="la la-edit"></i> </a>
                                    {{-- <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('sub_category.delete',$item->id)}}"
                                        onclick="return confirm('هل انت متأكد من حذف {{$item->sub_name}} ؟')" title="حذف"><i
                                            class="la la-remove"></i> </a> --}}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else
                    <div class="alert alert-info"> لا يوجد نتائج في البحث..... </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
