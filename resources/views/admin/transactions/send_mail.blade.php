<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 70%;
        }

        th, td {
            padding: 10px;
        }
        .th {
            font-weight: bold;
            width: 230px;
        }
    </style>
</head>
<body>
<p>Chào anh/chị, <br><br>Chân thành cảm ơn anh/chị đã đặt hàng tại MYS Store. <br>Chúng tôi sẽ xác nhận đơn hàng trong thời gian sớm nhất, chúc anh chị nhiều sức khỏe.</p>
<table border="1px">
    <tr>
        <td class="th">
            Họ tên khách hàng
        </td>
        <td>
            {{$trans->name}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Địa chỉ
        </td>
        <td >
            {{$trans->address}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Email
        </td>
        <td>
            {{$trans->email}}
        </td>
    </tr>
    <tr>
        <td class="th">
            Số điện thoại
        </td>
        <td>
            {{$trans->phone_number}}
        </td>
    </tr>

    <tr>
        <td class="th">
            Tổng tiền
        </td>
        <td>
            {{number_format($trans->total)}} VND
        </td>
    </tr>
    <tr>
        <td class="th">
            Hình thức thanh toán
        </td>
        <td>
            {{$trans->payment}}
        </td>
    </tr>
</table>

<h5>Ghi chú:</h5>
<p id="p">
    Nếu Anh/chị có bất kỳ thắc mắc, xin liên hệ với chúng tôi tại hongchau2000st@gmail.com, hoặc qua facebook.com/chaule.011
    <br>
<p id="footer">Trân trọng,</p>

</body>
</html>
