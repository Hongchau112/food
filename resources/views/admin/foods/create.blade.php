@extends('admin.foods.layout', [
    'title' => ( $title ?? 'Tạo sản phẩm mới' )
])

@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-lg-12">
                        <div class="card-inner card-inner-sm">
                            <form action="/admin/foods/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="name">Tên món <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên món" required>
                                    </div>
                                </div>

                                <!-- Ảnh-->


                                <div class="form-group">
                                    <label class="form-label" for="image">Ảnh<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input style="line-height: 15px"  type="file" class="form-control" name="file[]" accept="image/*" multiple>
{{--                                            <label class="custom-file-label" for="customFile">Chọn tệp</label>--}}
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <input style="line-height: 15px"  type="file" class="form-control" name="file[]" accept="image/*" multiple>--}}
{{--                                    <span  id="gallery"></span>--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control form-control-sm ckeditor" id="description" name="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="food_category_id">Danh mục<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" data-search="on" name="food_category_id" id="food_category_id">
                                            <option value="0">Danh mục gốc</option>
                                            @foreach ($food_category as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="number">Số lượng<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input class="form-control form-control-sm" id="number" name="number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="price">Giá <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input class="form-control form-control-sm" id="price" name="price">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-8 text-right">
                                        <div class="form-group mt-1 ">
                                            <button type="submit" class="btn btn-primary">Thêm món</button>
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


@push('footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="color[' + i +
                ']" placeholder="Nhập màu" class="form-control" /></td> <td><input type="text" name="price['+ i +
                ']" placeholder="Nhập giá" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endpush


