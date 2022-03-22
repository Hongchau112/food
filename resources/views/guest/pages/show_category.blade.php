@extends('guest.pages.layout', [
'title' => ( $title ?? 'Loại sản phẩm' )
])

@section('content')
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
                                <div>{{$food->price}}</div>
                                <a  href="{{route('guest.detail', ['id' => $food->id])}}" style="background: lightsalmon; border: lightcoral; font-family: 'tinymce-mobile', sans-serif; font-size: 13px; margin-top: -15px;" class="btn btn-primary btn-more">XEM CHI TIẾT</a>
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

