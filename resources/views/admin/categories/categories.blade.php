<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('/style/style.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  @include('admin.navbar')

  <main>
    <section class="mt-5">
      <div class="container">
        <h1>Kategori</h1>
      </div>
      <article>
        <div class="container">
          <div class="row">
            <div class="mt-3 back-shadow">
              <div class="text-end">
                <button type="button" class="btn btn-primary justify-content-end" data-bs-toggle="modal" data-bs-target="#addModal">
                  Tambah
                </button>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col" style="width: 20%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $c)
                  <tr role="row">
                    <td>
                      <img class="img-table" src="{{url($c->image)}}" alt="">
                    </td>
                    <td>{{$c->name}}</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('kategori/'.$c->id)}}" type="button" class="btn btn-primary">Edit</a>
                        <a href="javascript:void(0);" type="button" class="btn btn-danger deleteRow" data-id="{{$c->id}}">Hapus</a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- Pagination --}}
              <div class="d-flex justify-content-center">
                {!! $categories->links() !!}
              </div>
            </div>
          </div>
        </div>
      </article>
    </section>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formTambah" action="{{url('kategori')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nameAdd" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nameAdd" name="name" require>
            </div>
            <div class="mb-3">
              <label for="imgAdd" class="form-label">Unggah Gambar</label>
              <input class="form-control" type="file" id="imgAdd" name="image" require>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" form="formTambah">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
  (function($) {
    $(document).on('click', 'a.deleteRow', function() {
      var _id = $(this).attr('data-id');
      var _row = $(this).parent().parent().parent();
      _row.remove();

      // $.ajaxSetup({
      //   headers: {
      //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //   }
      // });

      $.ajax({
        url: "kategori/" + _id,
        type: 'DELETE',
        dataType: 'json',
        data: {
          id: _id,
          _token: "{{csrf_token()}}"
        },
        success: function(__resp) {
          console.log(_row);

          if (__resp.success) {
            _row.remove();
          }
        }
      });
    });
  })(jQuery);

  var status = "<?php if (isset($_GET['status'])) {
                  echo $_GET['status'];
                }; ?>"

  if (status == "success") {
    alert("Data berhasil ditambahkan");
  } else if (status == "failed") {
    alert("Data gagal ditambahkan");
  }
</script>

</html>