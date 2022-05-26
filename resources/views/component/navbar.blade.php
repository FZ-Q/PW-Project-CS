<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/coffee-beans-icon.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'pegawai') {
      ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pegawai/admin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="kategori.php">Kategori</a>
            </li>
          </ul>
        <?php
        } else {
        ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php?search=all&kategori=all">Menu</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                $sqlKNav = "SELECT * FROM kategori";
                $resultKNav = mysqli_query($conn, $sqlKNav);

                while ($kNav = mysqli_fetch_array($resultKNav)) {
                ?>
                  <li class="dropdown-item"><a href="menu.php?search=all&kategori=<?php echo $kNav['id']; ?>" class="nav-link p-0 text-muted"><?php echo $kNav['name']; ?></a></li>
                <?php
                }
                ?>
              </ul>
            </li>
            <li class="nav-item">
              <div class="wrapper">
                <a class="nav-link" href="cart.php">Cart</a>
                <span class="text-center">
                  <?php
                  if (isset($_SESSION['cart_item'])) {
                    echo count($_SESSION["cart_item"]);
                  } else {
                    echo "0";
                  }

                  ?>
                </span>
              </div>
            </li>
          </ul>
        <?php
        }
      } else {
        ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.php?search=all&kategori=all">Menu</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kategori
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              $sqlKNav = "SELECT * FROM kategori";
              $resultKNav = mysqli_query($conn, $sqlKNav);

              while ($kNav = mysqli_fetch_array($resultKNav)) {
              ?>
                <li class="dropdown-item"><a href="menu.php?search=all&kategori=<?php echo $kNav['id']; ?>" class="nav-link p-0 text-muted"><?php echo $kNav['name']; ?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <div class="wrapper">
              <a class="nav-link" href="cart.php">Cart</a>
              <span class="text-center">
                <?php
                if (isset($_SESSION['cart_item'])) {
                  echo count($_SESSION["cart_item"]);
                } else {
                  echo "0";
                }

                ?>
              </span>
            </div>
          </li>
        </ul>
      <?php
      }
      ?>
      <div class="d-flex">
        <?php
        if (!empty($_SESSION['id'])) {
        ?>
          <form action="profile.php" method="POST" style="margin-right: 10px;">
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
            <button class="btn btn-warning" value="submit"><?php echo $_SESSION['name']; ?></button>
          </form>
        <?php
          echo '<a class="btn btn-danger" href="logout.php">Logout</a>';
        } else {
          echo '<a class="btn btn-warning" href="login.php">Login</a>';
        }
        ?>
      </div>
    </div>
  </div>
</nav>