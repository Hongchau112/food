@extends('user.pages.layout', [
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
                            <!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <input class="input-group-field" type="number" id="quantity" name="quantity" value="1" min="1">
                                <div class="input-group-button">
                                    <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>


                            {{--                            <input name="qty" type="number" min="1"  value="1" />--}}
                            <ul class="custom-control-group">
                                {{$food->number}}
                            </ul>
                            <input type="hidden" name="foods_qty" id="foods_qty" value="{{$food->number}}">
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

                    <div class="container mt-5" id="comment-section">
                        <div class="d-flex justify-content-center row">
                            <div class="col-md-8">
                                <div class="d-flex flex-column comment-section">
                                    <form>
                                        @csrf
                                        <div id="comment_show" class="bg-white p-2">

                                        </div>

                                        <div class="bg-white p-2">
                                            <input type="hidden" id="comment_food_id" value="{{$food->id}}" class="comment_food_id">
                                            <input type="hidden"  value="{{$user->name}}" class="comment-name">

                                        </div>
                                    </form>
                                    <div class="bg-white">
                                        <div class="d-flex flex-row fs-12">
                                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold ">{{$user->name}}</span><span class="date text-black-50"></span></div>
{{--                                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>--}}
{{--                                            <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>--}}
{{--                                            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>--}}
                                        </div>
                                    </div>
                                    <div class="bg-light p-2">
                                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="{{asset('/images/avatar-cmt.jpg')}}" width="50"><textarea class="form-control ml-1 shadow-none textarea comment-content"></textarea></div>
                                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none send-comment" type="button">Bình luận</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Hủy</button></div>
                                        <div id="notify"></div>
                                    </div>
                                </div>
                            </div>
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

    <script>
        $(document).ready(function(){

            load_comment();

            function load_comment(){
                var food_id=$('#comment_food_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '/guest/load_comment',
                    type: "POST",
                    data: {_token:_token, food_id: food_id},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
                });

            }

            $('.send-comment').click(function(){
                var food_id=$('#comment_food_id').val();
                var _token = $('input[name="_token"]').val();
                var name = $('.comment-name').val();
                var content = $('.comment-content').val();

                $.ajax({
                    url: '/guest/send_comment',
                    type: "POST",
                    data: {_token:_token, food_id: food_id, name: name, content: content},
                    success:function(data){

                        $('#notify').html('<p>Thêm bình luận thành công! Đang chờ duyệt nhá</p>');
                        load_comment();
                        $('#notify').fadeOut(5000);
                        $('.comment-content').val('');


                    }
                });
            });
            load_comment();

        })
    </script>

    <!-- Thêm sản phẩm vào giỏ-->
    <script>
        $(document).ready(function(){
            $('#add_cart').click(function(){
                // var id=$('#get_price_id').val();
                var food_id=$('#food_id').val();
                var price=$('#get_price').val();
                var qty=$('#quantity').val();
                var food_qty = $('#foods_qty').val();
                // console.log(price);
                // console.log(qty);
                // console.log(food_id);
                if(qty>food_qty)
                {
                    alert("Số lượng món vượt quá số lượng sẵn có");
                    window.location.reload(true);
                }else {
                    $.ajax({
                        url: '/guest/add_cart/' + food_id,
                        type: "GET",
                        data: {price: price, foods_sold: qty, number: food_qty},
                        success: function (result) {
                            alert('Thêm sản phẩm thành công!');
                            window.location.reload(true);
                            $('#cart').html(result);
                        }
                    });
                }
            });
        });

        jQuery(document).ready(function(){
            // This button will increment the value
            $('[data-quantity="plus"]').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name='+fieldName+']').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });
            // This button will decrement the value till 0
            $('[data-quantity="minus"]').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    // Decrement one
                    $('input[name='+fieldName+']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(0);
                }
            });
        });

    </script>



@endpush


