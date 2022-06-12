<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <title>Cart</title>
</head>

<body>
  @include('component.navbar')

  @php
  $totalJumlah = 0;
  $totalHarga = 0;
  @endphp

  <main>
    <section style="margin-top: 100px;">
      <article>
        <div class="container">
          <div class="row justify-content-center">
            <h1>Cart</h1>
            <div class="col-md-10">
              <div class="back-shadow">
                <table id="cartList" class="table table-bordered table-striped table-hover text-center mb-4">
                  <thead>
                    <tr>
                      <th scope="col">Gambar</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Diskon</th>
                      <th scope="col">Total</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  @if (session::get('cart') != null)
                  <tbody>
                    @foreach($item_carts as $item)
                    <tr>
                      <td><img src="{{url($item['image'])}}" class="img-table" /></td>
                      <td class="align-middle">{{$item['name']}}</td>
                      <td class="align-middle">{{$item['jumlah_pembelian']}}</td>
                      <td class="align-middle">Rp{{number_format($item['price']);}}</td>
                      <td class="align-middle">Rp{{number_format($item['diskon']);}}</td>
                      <td class="align-middle">Rp{{number_format($item['harga_total_item']);}}</td>
                      <td class="align-middle">
                        <a class="btn btn-danger dCart" href="{{url('cart/remove/'. $item['id'])}}">Delete</a>
                      </td>
                    </tr>
                    @php
                    $totalJumlah += $item['jumlah_pembelian'];
                    $totalHarga += $item['harga_total_item'];
                    @endphp
                    @endforeach
                    <tr>
                      <td colspan="2">Total:</td>
                      <td> {{$totalJumlah}}</td>
                      <td class="pe-4" style="text-align: right;" colspan="3"><strong class="text-right">Rp{{number_format($totalHarga)}}</strong></td>
                      <td></td>
                    </tr>
                  </tbody>
                  @else
                  <tbody>
                    <tr>
                      <td colspan="7">
                        <a href="{{url('/menu/all')}}" class="btn my-btn-main mt-3">Order Now</a>
                      </td>
                    </tr>
                  </tbody>
                  @endif

                </table>
                <div class="row justify-content-center">
                  <div class="col-md-10">
                    <table class="table w-50">
                      <tbody>
                        <tr>
                          <td class="fw-bold">Nama</td>
                          <td>: {{Session::get('name')}}</td>
                        </tr>
                        <tr>
                          <td class="fw-bold">Status</td>
                          <td>: {{Session::get('status')}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-2">
                    <a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>