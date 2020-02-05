<?php
if (isset($_POST['cari'])) {
  $value = $_POST['barang'];
  header("Location: http://localhost/ProjectGts/search.php?cari=$value");
}
?>

<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark light-blue darken-3 pr-4 sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/ProjectGts/">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="form-control p-1 ml-4" style="width:35%">

      <form style="display: flex;" method="post">
        <!-- Kat -->
        <input class="w-responsive pl-1" type="text" name="barang" style="border: 0px; outline:none; flex: 1; font-size: 15px" maxlength="50" placeholder="Search">
        <button type="submit" class="input-group-text light-blue darken-3 float-right" name="cari" id="basic-addon11" style="border: 0px;"><i class="fas fa-search" style="color:white;"></i></button>
      </form>
      <!-- Default form subscription -->



    </div>

    <!-- Default form subscription -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">

      <!-- Mati
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php
        if (isset($_SESSION['username'])) {
          $id_user = $_SESSION['id_user'];
          $sql = "select count(id_user) as keranjang from keranjang where id_user = $id_user";
          $stmt = $db->query($sql);
          $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
          $hasil['keranjang'] = 3;
        }
        ?>
        <li class="nav-item pt-1 pr-2" id="ex3">
          <span class="p1 fa-stack" data-count="<?= $hasil['keranjang'] ?>">
            <a class="nav-link" href="keranjang.php">
              <i class="fas fa-shopping-cart"></i>
            </a>
        </li>
        <div class="garisY"></div>
        <?php
        if (isset($_SESSION['username'])) {
          require_once 'isLogin.php';
        } else {
          require_once 'isNotLogin.php';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
<!--/.Navbar -->