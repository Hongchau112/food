@extends('admin.transactions.layout', [
    'title' => ($title ?? 'Trang chủ đặt hàng')
])

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h5 class="title">Danh sách đặt hàng</h5>
                                        </div>
                                        <div class="card-tools mr-n1">
                                            <ul class="btn-toolbar">
                                                {{--                                                <li>--}}
                                                {{--                                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>--}}
                                                {{--                                                </li><!-- li -->--}}
                                                {{--                                                <li class="btn-toolbar-sep"></li><!-- li -->--}}
                                                <li>
                                                    <div class="dropdown">
                                                        {{--                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">--}}
                                                        {{--                                                            <em class="icon ni ni-setting"></em>--}}
                                                        {{--                                                        </a>--}}
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-check">
                                                                <li><span>Show</span></li>
                                                                <li class="active"><a href="#">10</a></li>
                                                                <li><a href="#">20</a></li>
                                                                <li><a href="#">50</a></li>
                                                            </ul>
                                                            <ul class="link-check">
                                                                <li><span>Order</span></li>
                                                                <li class="active"><a href="#">DESC</a></li>
                                                                <li><a href="#">ASC</a></li>
                                                            </ul>
                                                            <ul class="link-check">
                                                                <li><span>Density</span></li>
                                                                <li class="active"><a href="#">Regular</a></li>
                                                                <li><a href="#">Compact</a></li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                            </ul><!-- .btn-toolbar -->
                                        </div><!-- card-tools -->
                                        <div class="card-search search-wrap" data-search="search">
                                            <div class="search-content">
                                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                            </div>
                                        </div><!-- card-search -->
                                    </div><!-- .card-title-group -->
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <table class="table table-tranx">
                                        <thead>
                                        <tr class="tb-tnx-head">
                                            <th class="tb-tnx-id"><span class="">ID</span></th>
                                            <th class="tb-tnx-info">
                                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                    <span>Tên giao dịch</span>
                                                                </span>
                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                                    <span class="d-md-none">Ngày đặt</span>
                                                                    <span class="d-none d-md-block">
                                                                        <span>Ngày đặt</span>
                                                                    </span>
                                                                </span>
                                            </th>
                                            <th class="tb-tnx-amount is-alt">
                                                <span class="tb-tnx-total">Tổng tiền</span>
                                                <span class="b-tnx-desc d-none d-sm-inline-block">Trạng thái</span>
                                            </th>
                                            <th class="tb-tnx-action">
                                                <span>&nbsp;</span>
                                            </th>
                                        </tr><!-- tb-tnx-item -->
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>{{$order->id}}</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title">{{$order->name}}</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">1{{$order->created_at}}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount is-alt">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount">{{number_format($order->total)}}</span>
                                                    </div>
                                                    <div class="tb-tnx-status">
                                                        @if($order->status==0)
                                                            <span class="badge badge-circle badge-warning">Chưa xác nhận</span>
                                                        @elseif($order->status==1)
                                                            <span class="badge badge-circle badge-gray">Đã xác nhận</span>
                                                        @elseif($order->status==2)
                                                            <span class="badge badge-circle badge-info">Đang giao hàng</span>
                                                        @elseif($order->status==3)
                                                            <span class="badge badge-circle badge-success">Đã giao</span>
                                                        @else
                                                            <span class="badge badge-circle badge-danger">Huỷ</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="">Xem</a></li>
                                                                <li><a href="">Cập nhật</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <ul class="pagination justify-content-center justify-content-md-start">
                                        {!!$orders->links('pagination::bootstrap-4')!!}
                                    </ul><!-- .pagination -->
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection
