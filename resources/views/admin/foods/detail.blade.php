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
                                    <label class="form-label" for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm" required>
                                    </div>
                                </div>

                                <!-- Ảnh-->


                                <div class="form-group">
                                    <label class="form-label" for="image">Ảnh sản phẩm<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" multiple="" class="custom-file-input" id="image" name="image"
                                                   accept="image/png, image/gif, image/jpeg">
                                            <label class="custom-file-label" for="customFile">Chọn tệp</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input style="line-height: 15px"  type="file" class="form-control" name="file[]" accept="image/*" multiple>
                                    <span  id="gallery"></span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả sản phẩm" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="product_type_id">Danh mục<span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" data-search="on" name="product_type_id" id="product_type_id">
                                            <option value="0">Danh mục gốc</option>
                                            @foreach ($product_category as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Add Price</label>
                                    <table class="" id="dynamicAddRemove">
                                        <tr>
                                            <td><input type="text" name="color[0]" placeholder="Enter color" class="form-control" />
                                            </td>
                                            <td><input type="text" name="price[0]" placeholder="Enter price" class="form-control" />
                                            </td>
                                            <td><input type="text" name="size[0]" placeholder="Enter size" class="form-control" />
                                            </td>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Price</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row g-3">
                                    {{--                                    <div class="col-lg-6 col-md-4 ">--}}
                                    {{--                                        <div class="form-group mt-3">--}}
                                    {{--                                            <a href="{{ url()->previous() }}"><span class=" text-primary"> <em class="icon ni ni-arrow-long-left"></em>  Quay lại</span></a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="col-lg-6 col-md-8 text-right">
                                        <div class="form-group mt-1 ">
                                            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
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
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="size[' + i +
                ']" placeholder="Enter size" class="form-control" /></td><td><input type="text" name="color[' + i +
                ']" placeholder="Enter color" class="form-control" /></td> <td><input type="text" name="price['+ i +
                ']" placeholder="Enter price" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endpush


