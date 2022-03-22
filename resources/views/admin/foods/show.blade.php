@extends('admin.foods.layout', [
    'title' => ( $title ?? 'Chi tiết sản phẩm' )
])

@section('content')
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row pb-5">
                    <div class="col-lg-6">
                        @foreach($images as $image)
                            @if($image->food_id == $food->id)
                                <img class="product-images" src="{{asset('/'.$image->image_path)}}" alt="product_image" height="90%" style="padding-bottom: 20px">
                            @endif
                        @endforeach

                    </div><!-- .col -->
                    <div class="col-lg-6">
                        <div class="product-info mt-5 mr-xxl-5">
{{--                            <h4 class="product-price text-primary">$78.00 <small class="text-muted fs-14px"></small></h4>--}}
                            <h3 class="product-title">{{$food->name}}</h3>
                            <div class="product-meta">
                                <ul class="d-flex g-3 gx-5">
                                    <li>
                                        <div class="fs-14px text-muted">Loại sản phẩm</div>
                                        <div class="fs-16px fw-bold text-secondary">
                                            @foreach($categories as $category)
                                                @if($food->food_category_id==$category->id)
                                                    <div>{{$category->name}}</div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-meta">
                                <ul class="d-flex g-3 gx-5">
                                    <li>
                                        <div class="fs-14px text-muted">Giá</div>
                                        <div>{{$food->price}}</div>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-meta">
                                <h6 class="title">Số lượng</h6>
                                <div>{{$food->number}}</div>
                            </div><!-- .product-meta -->


                            <div class="product-excrept text-soft">
                                <dt class="title">Mô tả</dt>
                                <p class="lead">{!!$food->description!!}</p>
                            </div>
                        </div><!-- .product-info -->
                    </div><!-- .col -->
                </div><!-- .row -->
                <hr class="hr border-light">
            </div>
        </div>
    </div>
@endsection
