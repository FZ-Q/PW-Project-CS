<footer>
  <div class="container mt-5 mb-4">
    <div class="row">
      <div class="col-md-4">
        <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
          <img src="img/coffee-beans-icon.png" alt="">
        </a>
        <p class="text-muted">© F.A 2021</p>
      </div>

      <div class="col-md-4">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="menu.php?search=all&kategori=all" class="nav-link p-0 text-muted">Menu</a></li>
          <li class="nav-item mb-2"><a href="cart.php" class="nav-link p-0 text-muted">Cart</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Kategori</h5>
        <ul class="nav flex-column">
          <?php
          $sqlKNav = "SELECT * FROM kategori";
          $resultKNav = mysqli_query($conn, $sqlKNav);

          while ($kNav = mysqli_fetch_array($resultKNav)) {
          ?>
            <li class="nav-item mb-2"><a href="menu.php?search=all&kategori=<?php echo $kNav['id']; ?>" class="nav-link p-0 text-muted"><?php echo $kNav['name']; ?></a></li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</footer>