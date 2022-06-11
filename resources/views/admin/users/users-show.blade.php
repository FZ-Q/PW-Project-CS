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
     <section class="mt-5">
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
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" value="{{$user->password}}">
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