<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>عمل فاتورة</title>
</head>
<body>
@include('home.nav')
<br>
<!-- 
<div class="container">
  <div class="search">
    <input class = "form-control" type="search" name = "search" id = "search" placeholder = "search for a product">
  </div>
  </div>  
  <br>
<h2> اسم العميل  </h2>
<h3> {{Session::get('user_name')}}</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم المنتج</th>
      <th scope="col">السعر</th>
      <th scope="col">الكمية</th>
    </tr>
  </thead>
  <tbody>
  @if(session()->has('products'))
@foreach(session()->get('products') as  $product)

    <tr>
      <th scope="row">
      #  
    </th>
      <td>{{$product['product_name']}}</td>
      <td>{{$product['price']}}</td>
      <td>{{$product['quantity']}}</td>
      </tr>
@endforeach
@endif
  </tbody>
  <tbody id = "result">

  </tbody>
</table>

<script type="text/javascript">

$('#search').on('keyup', function() {
  $value = $(this).val();
  $.ajax({
  
    type: 'get',
    url: '{{URL::to('search')}}',
    data: { 'search': value },
    success: function(data) {
      console.log(data);
      $('#result').html(data);
    }
  });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<div class="container">
    <div class="search">
        <input class="form-control" type="search" name="search" id="search" placeholder="search for a product">
    </div>
</div>
<br>
<h2> اسم العميل </h2>
<h3> {{ Session::get('user_name') }}</h3>
<h3>رقم العميل  {{ Session::get('user_id') }}</h3>
<a href="{{url('print_pdf' , Session::get('user_id'))}}" class="btn btn-primary"> طباعة المستند</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم المنتج</th>
            <th scope="col">السعر</th>
            <th scope="col">الكمية</th>
        </tr>
    </thead>
    <tbody>
        @if (session()->has('products'))
            @foreach (session()->get('products') as $product)
            @if(session::get('user_id') == $product['user_id'])
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $product['product_name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                </tr>
                @endif
            @endforeach
            
        @endif
    </tbody>
    <tbody id="result">
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: { 'search': value },
                success: function(data) {
                    console.log(data);
                    $('#result').html(data);
                },
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>