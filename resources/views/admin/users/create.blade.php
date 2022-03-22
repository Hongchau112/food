@extends('admin.users.layout', [
    'title' => ( $title ?? 'Tạo tài khoản' )
])

@section('content')
<form action="/admin/store" method="POST">
    @csrf
    <div class="form-group">
        <label for="name" style="font-weight: bold">Tên *</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Vui lòng nhập tên">
    </div>
    <div class="form-group" >
        <label for="email" style="font-weight: bold">Email *</label>
        <input type="email" class="form-control" name="email"id="email"  placeholder="Vui lòng nhập địa chỉ email">
    </div>
    <div class="form-group">
        <label for="phone" style="font-weight: bold">Số điện thoại *</label>
        <input type="text" class="form-control" name="phone"id="phone"  placeholder="Vui lòng nhập số điên thoại">
    </div>
    <div class="form-group">
        <label for="new_password" style="font-weight: bold">Mật khẩu *</label>
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Vui lòng nhập mật khẩu">
    </div>
    <div class="form-group">
        <label for="new_password_confirmation" style="font-weight: bold">Xác nhận mật khẩu *</label>
        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Xác nhận mật khẩu">
    </div>
    <button type="submit" class="btn btn-primary">Tạo</button>
</form>
@endsection
