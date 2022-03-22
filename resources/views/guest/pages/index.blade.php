@extends('guest.pages.layout', [
'title' => ( $title ?? 'Trang chủ' )
])

@section('content')
    <!--Hien thi tat ca san pham -->
    <section class="carouselBanner">
{{--        <div id="carouselCosmetics" class="carousel slide" data-ride="carousel">--}}
{{--            <ol class="carousel-indicators">--}}
{{--                <li data-target="#carouselCosmetics" data-slide-to="0" class="active"></li>--}}
{{--                <li data-target="#carouselCosmetics" data-slide-to="1"></li>--}}
{{--                <li data-target="#carouselCosmetics" data-slide-to="2"></li>--}}
{{--            </ol>--}}
{{--            <div class="carousel-inner">--}}
{{--                <div class="carousel-item active">--}}
{{--                    <img class="w-100" src="{{asset('/mystore/img/MYS-2.png')}}" alt="First slide">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img class="w-100" src="{{asset('/mystore/img/backg-1.jpg')}}" alt="Second slide">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img class="w-100" src="{{asset('/mystore/img/MYS-1.png')}}" alt="Third slide">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <a class="carousel-control-prev" href="#carouselCosmetics" role="button" data-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Previous</span>--}}
{{--            </a>--}}
{{--            <a class="carousel-control-next" href="#carouselCosmetics" role="button" data-slide="next">--}}
{{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Next</span>--}}
{{--            </a>--}}
{{--        </div>--}}
    </section>


    <section class="all_product">
        <div class="container">
            <div class="row">
                @foreach ($foods as $food)
                    @php
                        $i = 0;
                    @endphp
                    <div class="col-3 mb-5">
                        <div class="card">
                            <a href="{{route('guest.detail', ['id' => $food->id])}}" id="image-thumbnail-index">
                                @foreach ($images as $image)
                                    @if ($image->food_id == $food->id && $i == 0)
                                        <img id="image-thumbnail"
                                             src="{{ asset('/' . $image->image_path) }}" alt="Card image cap">
                                        @php
                                            $i = 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </a>
                            <div class="card-body">
                                <div class="card-title" style="margin-top: -10px; white-space: nowrap;overflow: hidden; text-overflow: ellipsis;margin-bottom: 5px;font-family: 'Arial'; font-size: 15px; height: 30px; width: 180px;">{{ $food->name }}</div>
                                <div>{{number_format($food->price)}} đ</div>
                                <a  href="{{route('guest.detail', ['id' => $food->id])}}" style="background: #fd9d45; border: #fd9d45; font-family: 'tinymce-mobile', sans-serif; font-size: 13px; margin-top: 10px; margin-left: 35px;" class="btn btn-primary btn-more">XEM CHI TIẾT</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-inner" id="card-inner-id">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        {!!$foods->links('pagination::bootstrap-4')!!}
                    </div>
                </div><!-- .nk-block-between -->
            </div>
        </div>

    </section>
@endsection


