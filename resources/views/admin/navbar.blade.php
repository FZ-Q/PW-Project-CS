<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('admin-purchase')}}">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('admin-purchase')}}">Pembelian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('admin-menu')}}">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('admin-categories')}}">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('admin-user')}}">User</a>
        </li>
      </ul>
      <div class="d-flex">
        @if(session('status') != null)
        <a class="btn btn-warning" style="margin-right: 10px;" href="{{url('profile')}}">{{Session::get('name')}}</a>

        <a class="btn btn-danger" href="{{url('logout')}}">Logout</a>
        @else
        <a class="btn btn-warning" href="{{url('login')}}">Login</a>
        @endif
      </div>
    </div>
  </div>
</nav>