@extends('admin.users.layout', [
'title' => ( $title ?? 'User lists' )
])

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                            <li class="nk-block-tools-opt">
                                <div class="dropdown">
                                    <a href="{{ route('admin.create') }}" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em><span>Thêm tài khoản</span></a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>


    <div class="card-inner p-0">
        <div class="nk-tb-list nk-tb-ulist">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col nk-tb-col-check">
                    <div class="custom-control custom-control-sm custom-checkbox notext">
                        <input type="checkbox" class="custom-control-input" id="uid">
                        <label class="custom-control-label" for="uid"></label>
                    </div>
                </div>
                <div class="nk-tb-col"><span class="sub-text">User</span></div>
                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Email</span></div>
                <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                <div class="nk-tb-col nk-tb-col-tools text-right">
                    <div class="dropdown">
                        <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                            <ul class="link-tidy sm no-bdr">
{{--                                <li>--}}
{{--                                    <div class="custom-control custom-control-sm custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" checked="" id="ph">--}}
{{--                                        <label class="custom-control-label" for="phone">Số điện thoại</label>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="vri">
                                        <label class="custom-control-label" for="email">Email</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="st">
                                        <label class="custom-control-label" for="st">Status</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($userList as $user)
                <div class="nk-tb-item">
                    <div class="nk-tb-col nk-tb-col-check">
                        <div class="custom-control custom-control-sm custom-checkbox notext">
                            <input type="checkbox" class="custom-control-input" id="uid{{$user->id}}">
                            <label class="custom-control-label" for="uid{{$user->id}}"></label>
                        </div>
                    </div>
                    <div class="nk-tb-col">
                        <div class="user-card">
                            <div class="user-info">
                                <span class="tb-lead">{{$user->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="nk-tb-col tb-col-lg">
                        <ul class="list-status">
                            <li><em class="icon text-success ni ni-check-circle"></em> <span>{{$user->email}}</span></li>
                        </ul>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span class="tb-status text-success">Active</span>
                    </div>
                    <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-repeat"></em><span>Change password</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-na"></em><span>Block</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .nk-tb-item -->
            @endforeach
        </div><!-- .nk-tb-list -->
    </div>
@endsection
