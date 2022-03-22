
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif; width: 50%;  margin-left: 330px; }
        form {
            margin: 40px;
            background-color: lightblue;
            padding-top: 20px;
        }
        /*border: 2px solid #f1f1f1;*/

        input[type=text], input[type=password] {
            width: 80%;
            padding: 12px 20px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button{
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin-bottom: 40px;
            border: none;
            cursor: pointer;
            border-radius: 12px;
            margin-left: 125px;
        }

        button:hover {
            opacity: 0.8;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            margin-left: 110px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }
        label {
            margin-right: 25px;
        }

        /* Change styles for span and cancel button on extra small screens */
    </style>
</head>

<body>
<form action="{{route('admin.register_auth')}}" method="POST">
    @csrf
    <h1 style="text-align: center;">Đăng Ký</h1>
    <div class="imgcontainer">
        <img src="{{asset('/dashlite/images/avatar/avatar.jpg')}}" alt="Avatar" class="avatar">
    </div>
    <div class="container">
        <label for="name"><b>Tên </b></label><br>
        <input type="text" class='form-control' name ="name" value="{{old('name')}}" placeholder= "Vui lòng nhập username" required /><br><br>

        <label for="email"><b>Email </b></label><br>
        <input type="text" class='form-control' name ="email" value="{{old('email')}}" placeholder= "Vui lòng nhập email" required /><br><br>

        <label for="uname"><b>Số điệnt thoại </b></label><br>
        <input type="text" class='form-control' name ="phone" value="{{old('phone')}}" placeholder= "Vui lòng nhập số điện thoại" required /><br><br>

        <label for="psw"><b>Mật khẩu</b></label><br>
        <input type="password" class='form-control' name ="password" placeholder= "Vui lòng nhập mật khẩu" required /><br><br>
        <button type="submit">Đăng ký</button>
    </div>
</form>
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</body>
</html>

