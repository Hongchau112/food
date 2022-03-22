
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    * {box-sizing: border-box;}

    .topnav .search-container {
        float: right;
    }

    .topnav input[type=text] {
        padding: 2px 11px;
        margin-top: 8px;
        font-size: 16px;
        border: none;
        border: solid #f98e8e 1px;
    }

    .topnav .search-container button {
        float: right;
        /*padding: 6px 10px;*/
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    #submit-search {
        font-size: 12px !important;
        padding: 6px 17px ;
        background-color: #fdd5ab !important;
    }
    .fa fa-search {
        font-size: 14px;
    }

    .navbar-right {
        margin: -6px 35px 0 -20px;
    }

    #cart {
        color: #f1bf8b;
    }






</style>

<header>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <img class="navbar-brand" src="{{asset('mystore/img/logo.png')}}">
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse"--}}
{{--                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"--}}
{{--                    aria-label="Toggle navigation">--}}
{{--                <i class="fa fa-bars"></i>--}}
{{--            </button>--}}





            <div class="navbar-center collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-left" >
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('guest.index')}}">Trang chủ </a>
                    </li>
                    @php
                        $count=0;
                    @endphp

                    @foreach($categories as $i => $cate)
                        @if($cate->parent_category_id == 0)
                            @php
                                $count=$count+1;
                            @endphp
                        @endif

                        @if($count < 6)
                            @if($cate->parent_category_id==0)
                                <li class="nav-item dropdown">
                                    @php
                                        $flag = 0;
                                    @endphp
                                    @foreach($categories as $cate3)
                                        @if($cate3->parent_category_id==$cate->id)
                                            @php
                                                $flag = 1
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($flag==1)
                                        <a class="nav-link dropdown-toggle"  href="{{route('guest.show_category', ['id'=> $cate->id])}}">{{$cate->name}}</a>

                                    @else
                                        <a class="nav-link" href="{{route('guest.show_category', ['id'=> $cate->id])}}">{{$cate->name}}</a>
                                    @endif
                                    <div class="dropdown-menu" style="padding: 0px; ">
                                        @foreach($categories as $cate2)
                                            @if($cate2->parent_category_id==$cate->id)
                                                <a class="nav-link" href="{{route('guest.show_category', ['id'=> $cate2->id])}}">{{$cate2->name}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endif
                    @endforeach

                </ul>
                <div class="topnav">
                    <div class="search-container">
                        <form action="{{route('guest.search')}}" method="GET">
                            <input type="text" placeholder="Search.." name="key_search">
                            <button type="submit" id="submit-search" ><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div id="shopping-cart">
                    <a href="{{route('guest.show_cart')}}"><i class="fa fa-shopping-cart" style="color: #eb9773; font-size: 22px;"></i></a>
                    <span id="cart">@if(Session::has('cart')!=null){{Session::get('cart')->total_quanty}} @else 0 @endif</span>
                </div>
            </div>
        </div>
    </nav>
</header>

@push('footer')
    <script>
        $('#toggle-search').on('click', function() {
            $('#searchBar').toggle('display: inline-block');
        });
    </script>
@endpush

