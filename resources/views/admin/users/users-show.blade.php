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
  @include('admin.navbar')

  <main>
    <section class="mt-5 mb-5">
      <div class="container">
        <h1>Edit User</h1>
      </div>
      <article>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 back-shadow">
              <h3>{{$user->name}}</h3>
              <img class="img-detail" src="{{url($user->image)}}" alt="">
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
                  <label class="form-label">Status</label>
                  <select class="form-select" name="status">
                    <option value="pegawai" @if ($user->status == 'pegawai') selected @endif>Pegawai</option>
                    <option value="pelanggan" @if ($user->status == 'pelanggan') selected @endif>pelanggan</option>
                    <option value="member" @if ($user->status == 'member') selected @endif>member</option>
                  </select>
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
          </div>
        </div>
      </article>
    </section>
  </main>
</body>

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
      </div>`;
    document.getElementById("formEdit").insertAdjacentHTML("beforeend", $html);
  }
</script>

</html>