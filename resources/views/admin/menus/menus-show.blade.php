<!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Menu {{$menus->name}}</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="{{url('/style/style.css')}}">
 </head>

 <body>
   @include('admin.navbar')

   <main>
     <section class="mt-5">
       <div class="container">
         <h1>Edit Menu</h1>
       </div>
       <article>
         <div class="container">
           <div class="row justify-content-center">
             <div class="col-md-8 back-shadow">
               <h3>{{$menus->name}}</h3>
               <img class="img-detail" src="{{url($menus->image)}}" alt="">
               <form class="mt-4" id="formEdit" action="{{url('admin-menu/'.$menus->id)}}" method="post" enctype="multipart/form-data">
                 @method('PUT')
                 @csrf
                 <div class="mb-3">
                  <label for="formFile" class="form-label">Gambar</label>
                  <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="name" value="{{$menus->name}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Kategori</label>
                  <select class="form-select" name="c_id" value="{{$menus->c_id}}">
                    <option value="{{$menus->c_id}}">{{$menus->c->name}}</option>
                    @foreach ($kat as $kat)
                     <option value="{{$kat->id}}">{{$kat->name}}</option>
                     @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Harga</label>
                  <input type="number" class="form-control" name="price" value="{{$menus->price}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control" name="description" rows="3" >{{$menus->description}}</textarea>
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