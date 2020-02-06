<?php
session_start();
require '../application/config.php';
require '../application/function.php';

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}

  $barang = selectEdBarang();
  $row = $barang->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST["Simpan"])) {
    edBarang($_POST);
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
              body{
                  margin:0;
                  padding:0; 
                  font-family: 'open sans','tahoma',sans-serif;
              }
              .garisY{
                  width: 1px;
                  background: #e0e0e0;
              }
  
              .garisX{
                  height: 1.5px;
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
  
              select{
              border: 0;
              margin: 2px;
              border-right: 1px solid grey;
              max-width: 5.5em;
              outline: none;
              color: grey;
              }
  
              .footer{
                  color: #ffffff;
              }
  
              .list {
                  font-size: .9em;
                  list-style-type: none;
              }
  
              .list li a{
                  color: #ffffff;
                  letter-spacing: 0.8px;
              }
  
              .list li a:hover{
                  color: #eee0e0;
              }
  
              .box{
                  box-model: border-box;
                  background-clip:padding-box;
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
        <th scope="row">Nama Barang</th>
        <td><input type="text" name="nama" value="<?= $row['nama_barang'] ?>" class="form-control" required></td>
      </tr>
      <tr>
        <th scope="row">Harga Barang</th>
        <td><input type="number" name="harga" value="<?= $row['harga_barang'] ?>" class="form-control" required></td>
      </tr>
      <tr>
        <th scope="row">Stok Barang</th>
        <td><input type="number" name="stok" value="<?= $row['qty'] ?>" class="form-control" required></td>
      </tr>
      <tr>
        <th scope="row">Deskripsi Barang</th>
        <td><textarea type="text" name="deskripsi" class="form-control" rows="4" required><?= $row['deskripsi'] ?></textarea></td>
      </tr>
      <tr>
        <th scope="row">Gambar</th>
        <td><input type="file" class="form-control-file" name="gambar"></td>
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