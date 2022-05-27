<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/coffee-beans-icon.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php?search=all&kategori=all">Menu</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
            <li class="dropdown-item"><a href="{{url('menu/'.$category->name)}}" class="nav-link p-0 text-muted">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <div class="wrapper">
            <a class="nav-link" href="cart.php">Cart</a>
            <span class="text-center">
              0
            </span>
          </div>
        </li>
      </ul>
      <div class="d-flex">
        @if(session('status') == 'pegawai')
        <!-- Url update profile -->
        <a class="btn btn-danger" href="{{url('logout')}}">Logout</a>
        @else
        <a class="btn btn-warning" href="{{url('login')}}">Login</a>
        @endif
      </div>
    </div>
  </div>
</nav>