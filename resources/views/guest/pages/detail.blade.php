@extends('guest.pages.layout', [
    'title' => ($title ?? 'Chi tiết món ăn')
])

@section('content')
    <section class="product-detail">
        <div class="container">
            <div class="card-inner">
                <div class="row pb-5" style="margin-right: 0px;">
                    <div class="col-lg-6">
                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <ul id="imageGallery">
                                        @foreach ($images as $i => $image)
                                            <li data-thumb="{{asset('/' . $image->image_path) }}" data-src="{{asset('/' . $image->image_path) }}">
                                                <img  width="100%"  src="{{ asset('/' . $image->image_path) }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Thông tin sản phẩm  -->

                    </div>
                    <div class="col-lg-6">
                        <div class="product-info">
                            <h3 class="product-info-name" >{{ $food->name }}</h3>
                        </div>
                        <div class="product-meta">
                            <ul class="d-flex g-3 gx-5">
                                <li>
                                    <div class="text-muted">Loại</div>
                                    @foreach ($food_categories as $cate)
                                        @if ($food->food_category_id == $cate->id)
                                            <div id="product-info2" class="fw-bold text-secondary text-info">{{ $cate->name }}</div>
                                        @endif
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="product-meta">
                            <h6 class="text-muted">Số lượng món ăn hiện tại</h6>
                            <ul class="custom-control-group">
                                {{$food->number}}
                            </ul>
                            <!-- Size-->
                            <ul class="custom-control-group">
                                <input type="hidden" id="food_id" value="{{ $food->id }}">
                                <input type="hidden" id="get_price" value="{{ $food->price }}">
                            </ul>

                        </div><!-- .product-meta -->
                        {{ csrf_field() }}
                        <div class="product-info-quantity">
                            <div class="quantity buttons-added">
                                <div class="qty mt-5">
{{--                                                                        <span class="minus bg-dark">-</span>--}}
{{--                                                                        <input type="number" class="count" name="qty" value="1">--}}
{{--                                                                        <span class="plus bg-dark">+</span>--}}
{{--                                                                        <button onclick="AddCart({{$food->id}})" href="javascript:" class="btn-cart" id="cart-button"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ </button>--}}
                                    <a id="add_cart" href="javascript:" style="background: #fd9d45; border: #fd9d45; font-family: 'tinymce-mobile', sans-serif" class="btn btn-primary btn-more">THÊM VÀO GIỎ</a>
                                </div>
                            </div>
                        </div>

                        <div class="product-info-desc">
                            <div class="text-muted">Chi tiết sản phẩm</div>
                            <div class=class="col-sm-9" id="product-info"><p>{!! $food->description !!}</p></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('footer')
    <!-- xu li chon gia -->


    <!-- slider anh trong product detail -->
    <script>
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:3,
                slideMargin:0,
                enableDrag: false,
                currentPagerPosition:'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>

    <!-- Thêm sản phẩm vào giỏ-->
    <script>
        $(document).ready(function(){
            $('#add_cart').click(function(){
                // var id=$('#get_price_id').val();
                var food_id=$('#food_id').val();
                var price=$('#get_price').val();
                console.log(price);
                // console.log(id);
                console.log(food_id);
                $.ajax({
                    url: '/guest/add_cart/' +food_id,
                    type: "GET",
                    data:  {price: price},
                    success: function(result){
                        alert('Thêm sản phẩm thành công!');
                        window.location.reload(true);
                        $('#cart').html(result);

                    }
                });
            });
        });
    </script>

@endpush

