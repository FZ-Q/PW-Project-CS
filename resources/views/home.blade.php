<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('style/style.css')}}">
  <title>Home</title>
</head>

<body>
  @include('component.navbar')

  <main>
    <!-- Hero Carousel -->
    <section>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://img.freepik.com/free-psd/top-view-coffee-beans-desk_23-2148587098.jpg?w=1480&t=st=1648438644~exp=1648439244~hmac=ba8754aa106f0d41ce35e84c3f47e6dc37927751700b1d06139bcf503142d91c" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://img.freepik.com/free-vector/realistic-coffee-time-background-with-coffee-cup_79603-1560.jpg?w=1380&t=st=1648438762~exp=1648439362~hmac=e12c482b1134c8b00edbbf6d6ecea47e294871b2ca2c4c362b595576eab23d06" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://img.freepik.com/free-vector/realistic-coffee-background-with-drawings_79603-603.jpg?t=st=1648435258~exp=1648435858~hmac=aa0048739ece2f9ccf1d9baaedaa6b0dc24d537b91e703ec9d3a3ec90518c410&w=1380" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <!-- Section Menu Category -->
    <section>
      <div class="container">
        <div class="header-title">
          <h1 class="title-menu">Our Menu Category</h1>
        </div>
      </div>
      <article>
        <div class="container">
          <div class="row justify-content-center">
            @foreach ($categories as $category)

            <div class="col-md-4">
              <div class="card mt-4 mb-4 m-auto" style="width: 18rem;">
                <img src="{{url($category->image)}}" class="card-img-top card-img-category" alt="{{$category->name}}">
                <div class="card-body text-center align-bottom">
                  <h5 class="card-title fw-bold c-brown">{{$category->name}}</h5>
                  <a href="{{url('menu/'.$category->name)}}" class="btn my-btn c-brown mt-3">See More</a>
                </div>
              </div>
            </div>

            @endforeach

          </div>
        </div>
      </article>
    </section>

    <!-- Best menu  -->
    <section class="background-menu mt-5 " style="--image-url: url(https://img.freepik.com/free-photo/coffee_1205-604.jpg?1&t=st=1648448651~exp=1648449251~hmac=d78c97ec0f62d90bce2ece9b3eeadec6e588d37a55f821b478dd32d702c7571a&w=1380)">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="header-title c-yellow">
              <h1 class="title-menu">Our Best Menu</h1>
            </div>
          </div>
        </div>
        <article>
          <div class="container">
            <div class="row justify-content-center">
              @foreach ($menus as $menu)

              <div class="col-md-6 mt-4 mb-4">
                <div class="card w-75 transparency m-auto" style="width: 18rem;">
                  <img src="{{url($menu->image)}}" class="card-img-menu" alt="...">
                  <!-- Add menu to cart -->
                  <!-- <form id="addMenu" action="add_cart.php" method="post"> -->
                  <!-- <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="jumlah" id="jumlah" value='1'>
                  </form> -->
                  <button name="submit" form="addMenu" class="btn my-btn-2 c-white mt-3">
                    <div class="card-body text-center">
                      <h5 class="card-title fw-bold">{{$menu->name}}</h5>
                      Order Now
                    </div>
                  </button>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </article>
    </section>

  </main>
  @include('component.footer')

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>