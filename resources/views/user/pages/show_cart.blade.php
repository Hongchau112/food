@extends('user.pages.layout', [
    'title' => ($title ?? 'Chi tiết giỏ hàng')
])

@section('content')
    <section class="shopping-cart">
        <div class="container">
            <div class="row" style="margin-right: -15px;">
                <div class="col-lg-12">
                    <div class="cart-table">

                        <table>
                            @if(Session::has('cart') != null)
                                <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tùy chọn</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                @foreach(Session::get('cart')->foods as $food)

                                    <tbody>
                                    <tr>
                                        <td class="cart-pic first-row" >
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach ($images as $image)
                                                @if ($image->food_id == $food['id'] && $i == 0)
                                                    <img class="card-img-top"
                                                         src="{{ asset('/' . $image->image_path) }}"
                                                         alt="Card image cap">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="">{{$food['food']->name}}</td>

                                        <td class="" id="priceshow{{$food['price']}}">{{number_format($food['price']/$food['quanty'])}}</td>
                                        {{--                                    <td class="p-price first-row" id="priceshow{{$product['price_id']}}">{{$product['price']}}</td>--}}
                                        <input type="hidden" id="price" value="{{$food['price']}}">
                                        {{--                                        <input type="hidden" class="idPrice" value=" {{$food['price_id'] }} ">--}}

                                        <td class="quanty" id="quanty_show">{{$food['foods_sold']}}</td>

                                        <td class="qua-col first-row">
                                            <div class="size">
                                                <button class="delete-item" onclick="">Cập nhật món</button>
                                                {{--                                                    <span class="minus-quanty" onclick="deleteNumberItem('{{$food['price'] }}')">-</span>--}}
                                                {{--                                                    <input type="text" id="quantyFood" value="{{$food['quanty']}}">--}}
                                                {{--                                                    <span class="plus-quanty" onclick="">+</span>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </td>
                                        <td class="close-td first-row"><button class="delete-item" onclick="deleteCart('{{$food['food']->id}}')">Xóa</button></td>

                                    </tr>

                                    </tbody>
                                @endforeach
                            @else
                                <div>
                                    <div style="margin-top: -40px!important; margin-left: 160px;">Bạn chưa chọn sản phẩm nào.</div>
                                    <img src="{{asset('/mystore/img/empty-cart.png')}}" width="40%" style=" margin-left: 400px">
                                </div>
                            @endif
                        </table>
                    </div>
                    @if(Session::has('cart') != null)
                        <div class="row" style="margin-right: -15px;">
                            <div class="col-lg-4 offset-lg-8">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Tổng số lượng <span>{{Session::get('cart')->total_quanty}}</span></li>
                                        <li class="cart-total">Tổng tiền <span>{{number_format(Session::get('cart')->total_price)}} vnd</span></li>
                                        <input type="hidden" id="total-quanty-cart" value="{{Session::get('cart')->total_quanty}}">
                                    </ul>
                                    <a href="{{route('guest.order')}}" class="proceed-btn">Xử lý đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection

@push('footer')
    <script>
        function deleteCart(id){
            $.ajax({
                url: "/guest/delete_cart/" +id,
                type:"GET",
                success: function(result){
                    console.log(result);
                    $('#shopping-cart').empty();
                    $('#shopping-cart').html(result);
                    $('#cart').text($('#total_quanty').val())
                    console.log($('#totalquanty').val());
                    alert('Xóa sản phẩm thành công!');
                    window.location.reload(true);
                }
            });
        };
    </script>


    {{--    <script>--}}
    {{--        function addNumberItem(id){--}}
    {{--            var priceItems=$('#price'+id).val();--}}
    {{--            var number=$('#quantyProduct'+id).val();--}}
    {{--            var price= priceItems/number;--}}
    {{--            number++;--}}
    {{--            $('#quantyProduct'+id).attr('value',number);--}}
    {{--            $('#price'+id).attr('value',price*number);--}}
    {{--            $('#priceshow'+id).html(price);--}}
    {{--            $.ajax({--}}
    {{--                url: "/guest/update_cart/" +id,--}}
    {{--                type:"GET",--}}
    {{--                data:  {number:number,price:price},--}}
    {{--                success: function(result){--}}
    {{--                    $('#shopping-cart').empty();--}}
    {{--                    $('#shopping-cart').html(result);--}}
    {{--                    window.location.reload(true);--}}
    {{--                    $('#cart').text($('#total-quanty-cart').val())--}}
    {{--                }--}}
    {{--            });--}}
    {{--        };--}}
    {{--    </script>--}}


@endpush


