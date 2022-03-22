@extends('admin.food_categories.layout', [
    'title' => ( $title ?? 'Sửa danh mục món ăn' )
])

@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-12">
                        <div class="card-inner card-inner-sm">
                            <form action="{{route('admin.food_categories.update', ['id' => $food_category->id])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label class="form-label" for="name">Tên danh mục <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục" value="{{$food_category->name}}"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả danh mục" value="{{$food_category->description}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="parent_category_id">Danh mục cha <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <!-- Lay ten cua danh muc cha: so sanh trong the option: neu == thì selected, ngược lại ''-->
                                        <select class="form-select" name="parent_category_id" id="parent_category_id">
                                            <option {{($food_category->parent_category_id == 0) ? 'selected' : ''}} value="0">Thư mục gốc</option>
                                            @foreach ($categories as $cate)
                                                <option {{($cate->id == $food_category->parent_category_id) ? 'selected' : ''}} value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-4 ">
                                        {{--                                        <div class="form-group mt-3">--}}
                                        {{--                                            <a href="{{ url()->previous() }}"><span class=" text-primary"> <em class="icon ni ni-arrow-long-left"></em>  Quay lại</span></a>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <div class="col-lg-6 col-md-8 text-right">
                                        <div class="form-group mt-1 ">
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
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
