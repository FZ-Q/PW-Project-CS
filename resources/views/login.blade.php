<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">
  <title>Document</title>
</head>

<body class="background-login">
  <?php
  include 'nav.php';
  ?>

  <main style="margin-top: 150px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="p-4" style="background-color: #f9f8f6;">
            <h1 class="text-center">Login</h1>
            <form action="" method="POST">
              <div class="mb-3">
                <label for="iEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="Email" name="email" id="iEmail" required>
              </div>
              <div class="mb-3">
                <label for="iPass" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="iPass" required>
              </div>
              <div class="mb-3">
                <button name="submit" class="btn btn-primary">Login</button>
              </div>
              <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  if (isset($_SESSION['id'])) {
    header("Location: index.php");
  }

  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['status'] = $row['status'];
      if ($row['status'] == 'pegawai') {
        header("Location: pegawai/admin.php");
      } else {
        header("Location: index.php");
      }
    } else {
      echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
  }
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>