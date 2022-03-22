@extends('admin.layout', [
    'title' => ( $title ?? 'Quản lý tài khoản' )
])

@section('main')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body"><div class="nk-block-head nk-block-head-sm">
                        <ul class="breadcrumb breadcrumb-arrow">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ul>
                    </div><!-- .breadcrumb -->
                    <div class="nk-block-head ">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">{{$title}}</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt"><a href="{{route('admin.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Tạo tài khoản mới</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->

                    <div class="nk-block">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @yield('content')
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

{{--    <div class="nk-content nk-content-fluid">--}}
{{--        <div class="container-xl wide-lg">--}}
{{--            <div class="nk-content-body">--}}
{{--                <div class="nk-block-head nk-block-head-sm">--}}
{{--                    <div class="nk-block-between">--}}
{{--                        <div class="nk-block-head-content">--}}
{{--                            <h3 class="nk-block-title page-title">Users Lists</h3>--}}
{{--                            <div class="nk-block-des text-soft">--}}
{{--                                <p>You have total 2,595 users.</p>--}}
{{--                            </div>--}}
{{--                        </div><!-- .nk-block-head-content -->--}}
{{--                        <div class="nk-block-head-content">--}}
{{--                            <div class="toggle-wrap nk-block-tools-toggle">--}}
{{--                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>--}}
{{--                                <div class="toggle-expand-content" data-content="pageMenu">--}}
{{--                                </div>--}}
{{--                            </div><!-- .toggle-wrap -->--}}
{{--                        </div><!-- .nk-block-head-content -->--}}
{{--                    </div><!-- .nk-block-between -->--}}
{{--                    <div class="nk-block">--}}
{{--                        @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @yield('content')--}}
{{--                    </div><!-- .nk-block-head -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
