@extends("layouts.admin")
@section("title", "إدارة الطلبات ")
@section("title-side")
    <!-- <a href="{{asset('admin/products/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة منتج جديد
        </span>
    </span>
</a> -->
@endsection

@section("content")
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <form class='mb-3'>
                <div class="row">
                    <div class='col-2'>
                        <input name='id' id='id' value='{{request()->id}}' autofocus type="text" class='form-control  p-4'
                               placeholder="رقم الطلب..." />
                    </div>
                    <div class='col-5'>
                        <input name='q' id='q' value='{{request()->q}}' autofocus type="text" class='form-control  p-4'
                               placeholder="ابحث هنا..." />
                    </div>
                    <div class='col-3'>
                        <select name='order_status_id' id='order_status_id' class='form-control '>
                            <option value=''>الحالة</option>
                            @foreach($status as $statu)
                                <option value="{{$statu->id}}" {{request()->order_status_id==$statu->id ? "selected":"" }}>{{$statu->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class='col-2'>
                        <input type="submit" class='btn btn-primary mr-2' value='بحث' />
                        <input type="submit" class='btn btn-secondary' value='مسح البحث'
                               onclick="document.getElementById('q').value = ''; document.getElementById('order_status_id').value = ''; return true;" />
                    </div>

                </div>
            </form>

            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        @if($orders->count()>0)
                            <table
                                class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
                                id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1150px;">
                                <thead>
                                <tr role="row">
                                    <th>
                                        #
                                    </th>

                                    <th>حالة الطلب</th>
                                    <th>اجمالي السعر </th>
                                    <th>اجمالي الكميات </th>
                                    <th> الاسم</th>
                                    <th>رقم التلفون </th>
                                    <th>رقم الجوال </th>
                                    <th>المدينة </th>
                                    <th>العنوان </th>
                                    <th> تاريخ الطلب</th>
                                    <th width='15%'>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td width="5%">
                                            <b>{{$order->id}}</b>
                                        </td>

                                        <td>{{$order->orderStatus->name??''}}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->total_items}}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td width="15%">
                                            <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                               href="{{route('order.show',$order->id)}}" title="عرض"><i
                                                    class="la la-eye"></i> </a>

                                            <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                               href="{{route('order.delete',$order->id)}}"
                                               onclick="return confirm('هل انت متأكد من حذف  ؟ {{ $order->name }}')" title="حذف"><i
                                                    class="la la-remove"></i> </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links() }}
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
