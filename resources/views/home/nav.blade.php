<ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{url('add_bill')}}">عمل فاتورة جديدة</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/')}}">home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('old_bill')}}">استراجع فاتورة قديمة</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"> كشف حساب </a>
  </li>
  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            منتجات
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{url('add_product')}}">اضافة منتج</a></li>
            <li><a class="dropdown-item" href="{{url('edit_product')}}">تعديل منتج </a></li>
            <li><a class="dropdown-item" href="{{url('delete_product')}}">حذف منتج</a></li>
          </ul>
        </li>
</ul>