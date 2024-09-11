<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>اضافة فاتورة</title>
</head>
<body>
    @include('home.nav')
<form method ="post" action = "{{url('add_user')}}" >
  @csrf
  <div class="mb-3">
    <label  class="form-label">اسم العميل</label>
    <input type="text" class="form-control" id="name" name = "name">  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>

</body>
</html>