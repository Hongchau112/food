@extends('user.layout', [
'title' => ( $title ?? 'Trang chủ' )
])

@section('main')
    @yield('content')
@endsection
