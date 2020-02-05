<nav class="navbar navbar-expand-sm navbar-dark light-blue darken-3 pr-4 sticky-top">
  <a class="navbar-brand" href="#">Administrator</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item dropdown" id="master">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          Data Master
        </a>
        <div class="dropdown-menu" id="dropdownMaster" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="barang.php">Barang</a>
          <a class="dropdown-item" href="pesanan.php">Pesanan</a>
          <a class="dropdown-item" href="pengguna.php">Pengguna</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>

  </div>  
</nav>