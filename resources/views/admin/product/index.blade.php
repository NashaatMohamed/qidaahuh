@extends("layouts.admin")
@section("title", "إدارة المنتجات ")
@section("css")
<style>
    .cbActive+div{
        display:none;
    }
</style>
@endsection
@section("title-side")

<a href="{{asset('admin/products/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة منتج جديد
        </span>
    </span>
</a>
@endsection

@section("js")
    <script>
        $(function(){
            $(".cbActive").click(function(){
                var id= $(this).val();
                var cb = $(this);
                $(this).hide();
                $(this).next().show();
                //var checked= $(this).is(":checked");
                //var checked= $(this).prop("checked");
                //alert("ID: "+id+", Checked: "+checked);
                $.get('/admin/products/'+id+'/activate',function(){
                    //alert("Updated successfully")
                    $(cb).next().hide();
                    $(cb).show();
                })
            })
        })
    </script>
@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <form class='mb-3'>
            <div class="row">
                <div class='col-4'>
                    <input name='q' id='q' value='{{request()->q}}' autofocus type="text" class='form-control  p-4'
                        placeholder="ابحث هنا..." />
                </div>
                <div class='col-2'>
                    <select name='category' id='category' class='select2 form-control '>
                        <option value=''>الصنف</option>
                        @foreach($categories as $category)
                        <option {{request()->category==$category->id?"selected":""}} value="{{$category->id}}">
                            {{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class='col-2'>
                    <select name='active' id='active' class='select2 form-control'>
                        <option value=''>الحالة</option>
                        <option {{ request()->active=='1'?"selected":"" }} value='1'>فعال</option>
                        <option {{ request()->active=='0'?"selected":"" }} value='0'>غير فعال</option>
                    </select>
                </div>
                <div class='col-4'>
                    <input type="submit" class='btn btn-primary mr-2' value='بحث' />
                    <input type="submit" class='btn btn-secondary' value='مسح البحث'
                        onclick="document.getElementById('q').value = ''; document.getElementById('category').value = ''; document.getElementById('active').value = ''; return true;" />
                </div>

            </div>
        </form>

        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    @if($products->count()>0)
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
                                <th>اسم المنتج</th>
                                <th>الصنف</th>
                                <th>السعر العادي</th>
                                <th>سعر الخصم</th>
                                <th>الكمية المتوفرة</th>
                                <th>الحالة</th>
                                <th>الصورة الرئيسية</th>
                                <th width='15%'>خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr role="row" class="odd">
                                <td width="5%" class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{$product->category->name??''}}</td>
                                <td>{{ $product->regular_price==""?"$0":"{$product->regular_price}$" }}</td>
                                <td>{{ $product->sale_price==""?"$0":"{$product->sale_price}$" }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td align='center'><input value='{{ $product->id }}' type='checkbox' class='cbActive' {{ $product->active=='1'?"checked":"" }} />
                                <div class="m-spinner"></div>
                                </td>
                                <td><img height=50 width= 50 src='{{asset("storage/assets/img/{$product->main_image}")}}' alt=""></td>
                                <td width="15%">
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('products.show',$product->id)}}" title="عرض"><i
                                            class="la la-eye"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('products.edit',$product->id)}}" title="تعديل"><i
                                            class="la la-edit"></i> </a>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('products.delete',$product->id)}}"
                                        onclick="return confirm('هل انت متأكد من حذف {{$product->name}} ؟')" title="حذف"><i
                                            class="la la-remove"></i> </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                    @else
                    <div class='alert alert-info'><b>نأسف</b> !لا توجد نتائج
                        <button type="button" class="close pt-0" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection