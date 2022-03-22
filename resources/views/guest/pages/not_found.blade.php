@extends('guest.pages.layout', [
'title' => ( $title ?? 'Loại sản phẩm' )
])

@section('content')
    <section class="all_product">
        <div class="container">
            <p style="margin-top: -87px; font-size: 20px;">Không có sản phẩm nào được tìm thấy!</p>
            <img src="{{asset('/mystore/img/notf.jpg')}}" width="30%" style="margin-left: 315px">


        </div>

    </section>
@endsection

