<?php
session_start();
require '../application/config.php';
require '../application/function.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}

?>

<html>

<head>
    <title>Online Shop</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="../mdbootstrap/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../mdbootstrap/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="../mdbootstrap/css/style.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');

        body {
            margin: 0;
            padding: 0;
            font-family: 'open sans', 'tahoma', sans-serif;
        }

        .garisY {
            width: 1px;
            background: #e0e0e0;
        }

        .garisX {
            height: 1px;
            background: #e0e0e0;
        }

        #ex3 .fa-stack[data-count]:after {
            position: absolute;
            right: 0%;
            top: 1%;
            content: attr(data-count);
            font-size: 55%;
            padding: .45em;
            border-radius: 50%;
            border: 1px solid white;
            line-height: .8em;
            color: white;
            background: rgba(255, 0, 0, 0.85);
            text-align: center;
            min-width: 1em;
            font-weight: bold;
        }


        select {
            border: 0;
            margin: 2px;
            border-right: 1px solid grey;
            max-width: 5.5em;
            outline: none;
            color: grey;
        }

        .footer {
            color: #ffffff;
        }

        .list {
            font-size: .9em;
            list-style-type: none;
        }

        .list li a {
            color: #ffffff;
            letter-spacing: 0.8px;
        }

        .list li a:hover {
            color: #eee0e0;
        }

        .box {
            background-clip: padding-box;
        }

        .fullwidth {
            width: 100%;
        }

        .qty {
            width: 25%;
            height: 30%;
            border-radius: 2px 2px;
            border: none;
        }
    </style>
</head>

<body>
<?php
    require 'navbar.php';
    ?>

<div class="container mt-5">
  <h2>Data Barang</h2>
  <form method="post" enctype="multipart/form-data">
  <table class="table w-50">
    <tbody>
      <tr>
        <th scope="row">Username</th>
        <td><input type="text" name="nama" value="<?= $row['nama_barang'] ?>" class="form-control" required></td>
      </tr>
      <tr>
        <th scope="row">E-mail</th>
        <td><input type="number" name="harga" value="<?= $row['harga_barang'] ?>" class="form-control" required></td>
      </tr>
      <tr>
        <th scope="row">Telephone</th>
        <td><input type="number" name="stok" value="<?= $row['qty'] ?>" class="form-control" required></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" class="btn btn-sm light-blue darken-3" style="color:white;" value="Simpan" name="Simpan"></td>
      </tr>
  </tbody>
  </form>



    <!-- Javascript -->
    <script type="text/javascript" src="../mdbootstrap/js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../mdbootstrap/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../mdbootstrap/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../mdbootstrap/js/mdb.min.js"></script>

        <!--/.EndJavascript-->
</body>

</html>