@extends('admin.users.layout', [
    'title' => ( $title ?? 'Cập nhật mật khẩu' )
])

@section('content')
    <form action="{{route('admin.change_password', ['id' => $user_edit->id])}}" method="POST">
        @csrf
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="#" class="form-validate" novalidate="novalidate">
                    <div class="row g-gs">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="password">Mật khẩu hiện tại (*)</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password"required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="set_new_password">Mật khẩu mới (*)</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="set_new_password" id="set_new_password"required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="password_confirmation">Xác nhận lại mật khẩu mới (*)</label>
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
@endsection

