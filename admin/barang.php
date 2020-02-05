<?php
session_start();
require '../application/config.php';
require '../application/function.php';


if (isset($_POST["Simpan"])) {
  $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
  $nama = $_FILES['gambar']['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $ukuran    = $_FILES['gambar']['size'];
  $file_tmp = $_FILES['gambar']['tmp_name'];


  echo var_dump(in_array($ekstensi, $ekstensi_diperbolehkan));

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
        move_uploaded_file($file_tmp, '../gambar/' . $nama);
        addBarang($_POST);
        } else {
        echo "
        <script>
            alert('Gambar terlalu besar');
            document.location.href='barang.php';
        </script>";
        }
    } else {
   echo "
    <script>
        alert('Gambar belum dipilih');
        document.location.href='barang.php';
    </script>";
}
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
      <td><input type="text" name="nama" placholder="Masukan Kategori Barang" class="form-control" required></td>
    </tr>
    <tr>
      <th scope="row">Harga Barang</th>
      <td><input type="text" name="harga" placholder="Masukan Harga Barang" class="form-control" required></td>
    </tr>
    <tr>
      <th scope="row">Stok Barang</th>
      <td><input type="text" name="stok" placholder="Masukan Stok Barang" class="form-control" required></td>
    </tr>
    <tr>
      <th scope="row">Deskripsi Barang</th>
      <td><textarea type="text" name="deskripsi" placholder="Masukan Deskripsi Barang" class="form-control" rows="4" required></textarea></td>
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


<?php
$no = 1;
$barang = barang();
while($data = $barang->fetch(PDO::FETCH_ASSOC)){

?>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th class="w-25" scope="col">Nama</th>
      <th class="w-25" scope="col">Deskripsi</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <tr>  
        <td><? echo $no++; ?></td>
        <td><img src="../gambar/<? echo $data['gambar']; ?>" width="150px" height="150px"></td>
        <td><? echo $data['nama_barang']; ?></td>
        <td><? echo $data['deskripsi']; ?></td>
        <td><? echo $data['harga_barang']; ?></td>
        <td><a href='edit.php?barang=<? echo $data['nama_barang']; ?>'><i class='fas fa-edit' style='color: green;'></i>
                </a>&nbsp<a href='hapus.php?barang=<? echo $data['nama_barang']; ?>'><i class='far fa-times-circle' style='color: red;'></i>
                </a></td>
  </tr>
  </tbody>
</table>

<?php
}
?>

</div>


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