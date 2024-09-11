<!-- <!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>فاتورة </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        * {
            font-family: DejaVu Sans !important;
        }
        body {
            font-size: 16px;
            font-family: DejaVu Sans, 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
            padding: 10px;
            margin: 10px;

            color: #777;
        }
        .table-arabic {
            direction: rtl;
            text-align: right;
            unicode-bidi: embed;
        }

        .table-arabic th,
        .table-arabic td {
            text-align: right;
        }
        .h2 {
            font-family: DejaVu Sans !important;
            text-align: right;
            direction: rtl;
        }
    </style>
</head>
<body>
    <h2 >customer nubmer {{ $id }}</h2>
    <table class="table table-striped table-arabic">
        <thead>
            <tr>
                <th scope="col">الكمية</th>
                <th scope="col">السعر</th>
                <th scope="col">اسم المنتج</th>
                <th scope="col">رقم</th>
            </tr>
        </thead>
        <tbody>
        @php
                static $total = 0;
                static $i = 1;
            @endphp
            @foreach ($user_bill as $bill)
            @php
                $quantity = $bill->quantity;
                $price = $bill->product_price;
                $line_total = $quantity * $price;
                $total += $line_total;
            @endphp
            <tr>
                <td>{{ $bill->quantity }}</td>
                <td>{{ $bill->product_price }}</td>
                <td>{{ $bill->product_name }}</td>
                <th scope="row">{{ $i++ }}</th>
            </tr>
            @endforeach
    
        </tbody>
    </table>
<br>
    <h2 >الأجمالي: {{ $total }}</h2>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> -->
<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>Arabic Invoice </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            font-family: DejaVu Sans !important;
        }

        body {
            font-size: 16px;
            font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
            padding: 10px;
            margin: 10px;
        }


        body {
            text-align: right;
        }
        @page {
            size: a4;
            margin: 0;
            padding: 0;
        }

        .invoice-box table {
            direction: rtl;
            width: 100%;
            text-align: right;
            border: 1px solid;
            font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                        <td class="title"></td>
                            <td>
                            رقم العميل :{{$id}}<br />
                            اسم العميل :{{$user_name}} <br />
                            الأجمالي: {{ $total }} <br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
            <td>الكمية</td>
                <td>السعر</td>
                <td>اسم المنتج</td>
                <td>رقم</td>
            </tr>
            
            <tr class="item">
            @php
                static $total = 0; 
                 $i = 1; 
            @endphp
            @foreach ($user_bill as $bill)
            @php
                $quantity = $bill->quantity;
                $price = $bill->product_price;
                $line_total = $quantity * $price;
                $total += $line_total;
            @endphp
            <tr>
                <td>{{ $bill->quantity }}</td>
                <td>{{ $bill->product_price }}</td>
                <td>{{ $bill->product_name }}</td>
                <td scope="row">{{  $i++ }}</td>
            </tr>
            @endforeach
            </tr>
        </table>
    </div>
</body>
</html>