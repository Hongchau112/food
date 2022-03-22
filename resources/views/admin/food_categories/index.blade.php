@extends('admin.food_categories.layout', [
    'title' => ( $title ?? 'Danh mục món ăn' )
])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div>
                            @if($food_category->count() == 0)
                                <div class="card-inner p-0">
                                    <div class="alert m-0">
                                        <div class="alert alert-warning alert-icon">
                                            <em class="icon ni ni-alert-circle"></em> Bạn chưa có loại sản phẩm, <a href="{{ route('admin.food_categories.create') }}">tạo loại sản phẩm</a>.
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <div class="nk-tb-list">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
{{--                                                <input type="checkbox" class="custom-control-input" id="pid">--}}
{{--                                                <label class="custom-control-label" for="pid"></label>--}}
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm" style="font-weight: bold"><span>Tên danh mục</span></div>
                                        <div class="nk-tb-col" style="font-weight: bold"><span>Mô tả</span></div>
                                        <div class="nk-tb-col" style="font-weight: bold"><span>Danh mục cha</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                <li class="mr-n1">
                                                    <div style="font-weight: bold">Tùy chọn</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    @foreach($food_category as $cate)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
{{--                                                <input type="checkbox" class="custom-control-input" id="uid{{$cate->id}}">--}}
{{--                                                <label class="custom-control-label" for="uid{{$cate->id}}"></label>--}}
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-sub">{{$cate->name}}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">{{$cate->description}}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <div>
                                                @if ($cate->parent_category_id == 0)
                                                    <span class="tb-sub">Thư mục gốc</span>
                                                @else
                                                    @foreach($food_category as $cate_sub)
                                                        @if ($cate_sub->id == $cate->parent_category_id)
                                                            <span class="tb-sub">{{$cate_sub->name}}</span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                <li class="mr-n1">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{route('admin.food_categories.edit', ['id' => $cate->id])}}"><em class="icon ni ni-edit"></em><span>Sửa</span></a></li>
                                                                <li><a href="{{route('admin.food_categories.delete', ['id' => $cate->id])}}"><em class="icon ni ni-trash"></em><span>Xóa</span></a></li>
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
                        </div>
                        <div class="card-inner">
                            <ul class="pagination justify-content-center justify-content-md-start">
                                {!!$food_category->links('pagination::bootstrap-4')!!}
                            </ul><!-- .pagination -->
                        </div><!-- .card-inner -->
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection


