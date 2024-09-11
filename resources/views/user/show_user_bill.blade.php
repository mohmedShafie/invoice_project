<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>استرجاع فاتورة قديمة</title>
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">السعر</th>
      <th scope="col">الكمية</th>
      <th scope="col">handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user_bills as $user_bill)
    <tr>
      <th scope="row">1</th>
      <td>{{$user_bill->product_name}}</td>
      <td>{{$user_bill->product_price}}</td>
      <td>{{$user_bill->quantity}}</td>
      <td><a href="{{url('delete_product_from_bill' , $user_bill->product_id)}}"  class = "btn btn-danger"> حذف</a></td>

    </tr>
    @endforeach
  </tbody>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>