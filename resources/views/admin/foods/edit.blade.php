@extends('admin.foods.layout', [
    'title' => ( $title ?? 'Sửa sản phẩm' )
])

@section('content')
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-12">
                        <div class="card-inner card-inner-sm">
                            <form action="/admin/foods/update/{{$food->id}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label class="form-label" for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm" value="{{$food->name}}"required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control form-control-sm ckeditor" id="description" name="description"  required>{{$food->description}}</textarea>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="form-label" for="food_category_id">Danh mục cha <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <!-- Lay ten cua danh muc cha: so sanh trong the option: neu == thì selected, ngược lại ''-->
                                        <select class="form-select" name="food_category_id" id="food_category_id">
                                            <option {{($food->food_category_id == 0) ? 'selected' : ''}} value="0">Thư mục gốc</option>
                                            @foreach ($categories as $cate)
                                                <option {{($cate->id == $food->food_category_id) ? 'selected' : ''}} value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="price">Giá<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input class="form-control form-control-sm" id="price" name="price" value="{{$food->price}}" required>
                                    </div>
                                </div>


                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-4 ">
                                        {{--                                        <div class="form-group mt-3">--}}
                                        {{--                                            <a href="{{ url()->previous() }}"><span class=" text-primary"> <em class="icon ni ni-arrow-long-left"></em>  Quay lại</span></a>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>
@endsection

@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endpush

