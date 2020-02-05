<?php
$usr = $_SESSION['username'];
$sql = "select email,username from pengguna where email='$usr' || username='$usr'";
$stmt = $db->query($sql);
$hasil = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<li class="nav-item avatar dropdown ml-3">
  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" height="25px" width="25px" class="rounded-circle z-depth-0" alt="avatar image">
    <font><?php echo $hasil['username']; ?></font>
  </a>
  <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
    <a class="dropdown-item" href="#">Profile</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</li>