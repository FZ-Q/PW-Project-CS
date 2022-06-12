<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User {{$user->name}}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/style/style.css')}}">
</head>

<body>
  @if (Session::get('status') == 'pegawai')
  @include('admin.navbar')
  @else
  @include('component.navbar')
  @endif

  <main>
    <section class="mt-5 mb-5">
      <div class="container pt-5">
        <h1>Profile</h1>
      </div>
      <article>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7 back-shadow">
              <h3>{{$user->name}}</h3>
              <h5>{{$user->status}}</h5>
              <div class="row">
                <div class="col-md-6">
                  <img class="img-detail" src="{{url($user->image)}}" alt="">
                </div>
                <div class="col-md-6">
                  <h5>Pengajuan Member</h5>
                  <button class="btn btn-success">Register</button>
                </div>
              </div>
              <form class="mt-4" id="formEdit" action="{{url('admin-user/'.$user->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="formFile" class="form-label">Gambar</label>
                  <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="changePassword">
                  <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                </div>
              </form>

              <div class="mb-3">
                <button name="submit" form="formEdit" class="btn btn-primary">Update</button>
              </div>
            </div>
            <div class="col-md-4 offset-md-1 back-shadow">
              <h3>Riwayat Pembelian</h3>
              <div style="overflow-y: scroll; max-height: 500px">
                <div class="container">
                  <div class="row justify-content-center">
                    @foreach ($purchases as $purchase)
                    <div class="col-md-12 mb-3">
                      <div class="card p-2">
                        <div class="card-body mb-0">
                          <p class="card-text">{{date_format($purchase->created_at,"d-m-Y")}}</p>
                          <h6 class="card-title">{{$purchase->menu->name}}</h6>
                          <p class="card-text">{{$purchase->qty}}</p>
                          <p class="card-text">Rp{{number_format($purchase->price)}}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </section>
  </main>
</body>
@include('component.footer')
<script>
  var changePass = document.getElementById('changePassword');

  changePass.addEventListener('change', function() {
    if (this.checked) {
      addCode();
    } else {
      var element = document.getElementsByClassName("password");
      if (element.length > 0) {
        do {
          element[0].remove();
        }
        while (element.length > 0);
      }
    }
  });

  function addCode() {
    var $html = `<div class="mb-3 password">
  <label for="iPass" class="form-label">Password</label>
  <input type="password" class="form-control" placeholder="Password" name="password" id="iPass">
</div>
<div class="mb-3 password">
  <label for="iCPass" class="form-label">Konfirmasi Password</label>
  <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="iCPass">
</div>`;
    document.getElementById("formEdit").insertAdjacentHTML("beforeend", $html);
  }
</script>

</html>