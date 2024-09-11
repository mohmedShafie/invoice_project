<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>plumber app </title>
</head>
<body>
@include('home.nav')
<form action="{{url('insert_product')}}"  method="POST">
    @csrf
  <div class="mb-3">
    <label  class="form-label">اسم المنتج</label>
    <input type="text" class="form-control" id="name"  name='name'>
  </div>
  <div class="mb-3">
    <label  class="form-label">السعر</label>
    <input type="text" class="form-control" id="price" name ='price' >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>