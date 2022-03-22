@extends('admin.users.layout', [
    'title' => 'Chi tiết tài khoản'
])

@section('content')
    <div class="card-inner">
        <div class="nk-block">
            <div class="profile-ud-list">
                <div class="profile-ud-item">
                    <div class="profile-ud wider">
                        <span class="profile-ud-label">Số thứ tự</span>
                        <span class="profile-ud-value">{{$user_show->id}}</span>
                    </div>
                </div>
                <div class="profile-ud-item">
                    <div class="profile-ud wider">
                        <span class="profile-ud-label">Tên</span>
                        <span class="profile-ud-value">{{$user_show->name}}</span>
                    </div>
                </div>
                <div class="profile-ud-item">
                    <div class="profile-ud wider">
                        <span class="profile-ud-label">Địa chỉ email</span>
                        <span class="profile-ud-value">{{$user_show->email}}</span>
                    </div>
                </div>
                <div class="profile-ud-item">
                    <div class="profile-ud wider">
                        <span class="profile-ud-label">Số điện thoại</span>
                        <span class="profile-ud-value">{{$user_show->phone}}</span>
                    </div>
                </div>
            </div><!-- .profile-ud-list -->
        </div><!-- .nk-block -->

    </div><!-- .card-inner -->
@endsection
