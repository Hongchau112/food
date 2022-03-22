@extends('guest.layout', [
'title' => ( $title ?? '' )
])

@section('main')
    @yield('content')
@endsection
