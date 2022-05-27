<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('style/style.css')}}">
  <title>Menu</title>
</head>

<body>
  @include('component.navbar')

  <main>
    <section class="background-menu" style="--image-url: url(https://img.freepik.com/free-photo/top-view-roasted-coffee-beans-isolated-white-background-with-copy-space_141793-7129.jpg?t=st=1648698072~exp=1648698672~hmac=fa955d4bc51381e76182393637a9a63dd2e7320d7f40816b18424c8f4402a65b&w=1380)">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="header-title">
              <h1 class="title-menu c-white">Our {{ucfirst($filter)}} Menu</h1>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <input type="text" id="search" class="form-control my-input" placeholder="Search">
          </div>
        </div>
        <article>
          <div class="container">
            <div id="listMenu" class="row justify-content-center">
              @foreach ($menus as $menu)

              <div class="col-md-6 mt-4 mb-4">
                <div class="card  w-75 m-auto p-5" style="width: 18rem;">
                  <img src="{{url($menu->image)}}" class="card-img-menu" alt="{{$menu->name}}">
                  <div class="card-body m-0 text-center">
                    <div class="row">
                      <div class="col-md-12">
                        <h5 class="card-title fw-bold c-brown">{{$menu->name}}</h5>
                      </div>
                      <div class="col-md-6">
                        <a href="{{url('detail'.$menu->id)}}" class="btn my-btn c-brown mt-3">See More</a>
                      </div>
                      <div class="col-md-6">
                        <form action="add_cart.php" method="post">
                          <input type="hidden" name="id" id="id" value="{{$menu->id}}">
                          <input type="hidden" name="jumlah" id="jumlah" value='1'>
                          <button type="submit" class="btn my-btn-main mt-3">Order Now</button>
                        </form>
                      </div>
                    </div>
                  </div>
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

<script>
  var input = document.getElementById("search");
  input.addEventListener("input", myFunction);

  function myFunction(e) {
    var filter = e.target.value.toUpperCase();

    var list = document.getElementById("listMenu");
    var divs = list.getElementsByTagName("div");
    for (var i = 0; i < divs.length; i++) {
      var title = divs[i].getElementsByTagName("h5")[0];

      if (title) {
        if (title.innerHTML.toUpperCase().indexOf(filter) > -1) {
          divs[i].style.display = "";
        } else {
          divs[i].style.display = "none";
        }
      }
    }

  }
</script>

</html>