<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('admin-menu')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('admin-menu')}}">Menu</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{url('admin-categories')}}">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('admin-user')}}">User</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php
        if (!empty($_SESSION['name'])) {
        ?>
          <form action="../profile.php" method="POST" style="margin-right: 10px;">
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
            <button class="btn btn-warning" value="submit"><?php echo $_SESSION['name']; ?></button>
          </form>
        <?php
          echo '<a class="btn btn-danger" href="../logout.php">Logout</a>';
        } else {
          echo '<a class="btn btn-warning" href="../login.php">Login</a>';
        }
        ?>
      </div>
    </div>
  </div>
</nav>