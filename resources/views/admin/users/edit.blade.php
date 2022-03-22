@extends('admin.users.layout', [
    'title' => ( $title ?? 'Chỉnh sửa thông tin' )
])

@section('content')
    <form action="/admin/update/{{$user_edit->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" value="{{$user_edit->name}}" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">Địa chỉ email</label>
            <input type="email" class="form-control" value="{{$user_edit->email}}" name="email"id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="phone" >Số điện thoại</label>
            <input type="text" class="form-control" value="{{$user_edit->phone}}" name="phone" id="phone" placeholder="Mobile phone">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection

