<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/style.css">
  <title>Pembelian</title>
</head>

<body>
  @include('admin.navbar')

  <main>
    <section class="mt-5">
      <div class="container">
        <h1>Laporan Pembelian</h1>
      </div>
      <article>
        <div class="container">
          <div class="row">
            <div class="mt-3 back-shadow">
              <h4>Total Pendapatan : Rp{{number_format($total_pembelian)}}</h4>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Menu</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Jumlah Pembelian</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($purchases as $purchase)
                  <tr>
                    <td>{{$purchase->menu->name}}</td>
                    <td>{{$purchase->user->name}}</td>
                    <td>{{$purchase->qty}}</td>
                    <td>Rp{{number_format($purchase->price)}}</td>
                    <td>{{date_format($purchase->created_at,"d-m-Y")}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- Pagination --}}
              <div class="d-flex justify-content-center">
                {!! $purchases->links() !!}
              </div>
            </div>
          </div>
        </div>
      </article>
    </section>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>