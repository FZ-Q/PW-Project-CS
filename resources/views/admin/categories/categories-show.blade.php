<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori {{$category->name}}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/style/style.css')}}">
</head>

<body>
  @include('admin.navbar')

  <main>
    <section class="mt-5">
      <div class="container">
        <h1>Edit Kategori</h1>
      </div>
      <article>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 back-shadow">
              <h3>{{$category->name}}</h3>
              <img class="img-detail" src="{{url($category->image)}}" alt="">
              <form class="mt-4" id="formEdit" action="{{url('kategori/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="imgAdd" class="form-label">Unggah Gambar</label>
                  <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="mb-3">
                  <label for="nameAdd" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nameAdd" name="name" value="{{$category->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>

            </div>
          </div>
        </div>
      </article>
    </section>
  </main>
</body>

</html>