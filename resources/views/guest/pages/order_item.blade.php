@extends('guest.pages.layout', [
    'title' => ($title ?? 'Đặt hàng')
])
<style>
    #submit-search{
        padding: 9px 17px !important;
    }
    <link rel="stylesheet" href="{{asset('mystore/css/order.css')}}">
</style>
@section('content')
    <div class="order-cart">
        <div class="row pb-5" style="margin-left: 50px;">
            <div class="col-lg-6" id="order-info" >
                <h4 class="mb-3" id="title-order">Đặt hàng</h4>
                <form class="needs-validation" action="{{route('guest.transaction.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="name" class="label">Họ và tên *</label>
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Họ và tên" required >
                            <span id="error_username">
                            </span>
                        </div>
                        <div class="col-md-6 mb-3" id="phone">
                            <label for="lastName" class="label">Số điện thoại *</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            <span id="error_phone"></span>
                        </div>
                    </div>

                    <div class="mb-3" id="address-order">
                        <label for="address" class="label">Địa chỉ *</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Ví dụ: 95/30 Mậu Thân, Xuân Khánh, Ninh Kiều, Cần Thơ" required>
                        <span id="error_address"></span>
                    </div>

                    <div class="mb-3" id="mail-order">
                        <label for="email" class="label">Email *</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Ví dụ: hongchau123@gmail.com" required>
                        <span id="error_email"></span>
                    </div>

                    <div class="mb-3" id="note-order">
                        <label for="note" class="label">Note *</label>
                        <textarea class="form-control" id="note" name="note" placeholder="Ví dụ: Hàng dễ vỡ, xin nhẹ tay"></textarea>
                    </div>

                    <div class="checkout__input__checkbox">
                        <input type="checkbox" name="payment" id="payment">
                        <span class="checkmark"></span>
                        <label for="payment" class="label">
                            Thanh toán trực tiếp khi nhận hàng
                        </label>
                    </div>
                    <div class="checkout__input__checkbox">
                        <input type="checkbox" id="paypal">
                        <span class="checkmark"></span>
                        <label for="paypal" class="label">
                            Thanh toán qua khoản ngân hàng
                        </label>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block"  id="order-button" type="submit">Xác nhận đặt hàng</button>
                    <input type="hidden" name="total" value="{{Session::get('cart')->total_price}}">
                </form>
            </div>

            <div>
                <div class="col-lg-6" style="margin-left: 90px; margin-top: 90px; max-width: 360px; border: solid #ffb47a 2px; padding: 0px 20px; background-color: #fdf2bf;">
                    <h4 class="order-title">Đơn hàng của bạn</h4>
                    <div class="total-price" id="total-price">
                        <ul>
                            <li class="subtotal">Số sản phẩm <span id="item">{{Session::get('cart')->total_quanty}}</span></li>
                            <li class="cart-total" style="width: 320px;">Tổng tiền <span id="total">{{number_format(Session::get('cart')->total_price)}} VND</span></li>
                            <input type="hidden" id="total-quanty-cart" value="{{Session::get('cart')->total_quanty}}">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#order-button').click(function (){
                var username = $('#name').val();
                var phone = $('#phone_number').val();
                var address = $('#address').val();
                var email = $('#email').val();

                if ((username!='') && (phone!='') && (address!='') && (email!='')) {
                    alertify
                        .alert("Bạn đã đặt hàng thành công!", function () {
                            alertify.message('OK');
                        });
                }
            });
        })

        // $(document).ready(function(){
        //     $('#email').change(function(){
        //         var email = $('#email').val();
        //
        //         var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        //         if(!filter.test(email)){
        //             $('#error_email').html('<label class="cart-error">Email không hợp lệ!</label>');
        //             $('#order-button').attr('disabled', 'disabled');
        //         }else{
        //             $('#error_email').html(' ');
        //             $('#order-button').attr('disabled', false);
        //         }
        //     })
        // })
        //
        // $(document).ready(function(){
        //     $('#phone_number').change(function(){
        //         var phone = $('#phone_number').val(); //lay gia tri so dien thoai da nhap
        //         var check_phone = /((09|03|07|08|05)+([0-9]{8})\b)/g;; //kiem tra voi cac dau so o VN
        //         if(check_phone.test(phone)==false){
        //             // $('#phone').addClass('has-error');
        //             $('#error_phone').html('<label class="cart-error">Số điện thoại không hợp lệ!</label>');
        //             $('#checkout').attr('disabled', 'disabled');
        //         }else{
        //             $('#error_phone').html(' ');
        //             // $('#phone').removeClass('has-error');
        //             $('#checkout').attr('disabled', false);
        //         }
        //     });
        // });

    </script>
@endpush

