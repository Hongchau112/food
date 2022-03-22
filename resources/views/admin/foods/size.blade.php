@extends('admin.products.layout', [
    'title' => ( $title ?? 'Thêm size' )
])

@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="product-meta">
                        <h6 class="title">Size hiện có</h6>
                        <ul class="custom-control-group">
                            @foreach($sizes as $size)
                                <li>
                                    <div class="custom-control custom-radio custom-control-pro no-control">
                                        <input type="radio" class="custom-control-input" name="sizeCheck{{$size->id}}" id="sizeCheck1">
                                        <label class="custom-control-label" for="sizeCheck{{$size->id}}">{{$size->name}}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- .product-meta -->
                    <div class="col-lg-12">
                        <div class="card-inner card-inner-sm">
                            <form action="{{route('admin.products.store_size')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="size">Size<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Size" required>
                                    </div>
                                    <div class="col-lg-6 col-md-8 text-right">
                                        <div class="form-group mt-1 ">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </div>
                                    <div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
