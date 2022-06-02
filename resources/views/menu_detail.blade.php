<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('style/style.css')}}">
  <title>{{$menus->name}}</title>
</head>

<body>
  @include('component.navbar')
  <main>
    <section class="background-menu" style="--image-url: url(https://img.freepik.com/free-vector/coffee-beans-seamless-pattern-sketch-style_1182-1332.jpg?t=st=1648746538~exp=1648747138~hmac=7b74277b4281c59f0bf8ac8d9564e822c1193123b0d660af55bb420d8cf7cea8&w=826)">
      <div class="container mt-5 pt-5">
        <article>
          <div class="card back-shadow">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <img src="{{url($menus->image)}}" class="card-img-detail" alt="{{$menus->name}}">
              </div>
              <div class="col-md-6">
                <h1 class="c-brown">{{$menus->name}}</h1>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td>{{$menus->c->name}}</td>
                    </tr>
                    <tr>
                      <td>Harga</td>
                      <td>:</td>
                      <td>Rp {{number_format($menus->price)}}</td>
                    </tr>
                    <tr>
                      <td>Deskripsi</td>
                      <td>:</td>
                      <td>{{$menus->description}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-2 text-center">
                <form action="add_cart.php" method="post">
                  <input type="hidden" name="id" id="id" value="id">
                  <div class="btn-group" role="group">
                    <div class="btn btn-danger" id="minus">-</div>
                    <input class="form-control text-center" type="number" name="jumlah" id="jumlah" value='1'>
                    <div class="btn btn-success" id="plus">+</div>
                  </div>
                  <button type="submit" class="btn my-btn-main mt-3">Order Now</button>
                </form>
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>
  </main>

  @include('component.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
  const minusButton = document.getElementById('minus');
  const plusButton = document.getElementById('plus');
  const inputField = document.getElementById('jumlah');

  minusButton.addEventListener('click', event => {
    event.preventDefault();
    const currentValue = Number(inputField.value) || 0;
    if (currentValue > 1) {
      inputField.value = currentValue - 1;
    }
  });

  plusButton.addEventListener('click', event => {
    event.preventDefault();
    const currentValue = Number(inputField.value) || 0;
    inputField.value = currentValue + 1;
  });
</script>

</html>