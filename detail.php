<?php
session_start();
require 'application/config.php';
require 'application/function.php';

?>

<html>

<head>
    <title>Online Shop</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="mdbootstrap/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="mdbootstrap/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="mdbootstrap/css/style.css">

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
    require 'header.php';
    global $db;
    $id = $_GET['id'];
    $sql = "select * from barang where nama_barang = '$id' ";
    $barang = $db->query($sql);
    $row = $barang->fetch(PDO::FETCH_ASSOC);
    $id_user = $_SESSION['id_user'];

    if (isset($_POST['cart'])) {

        $id = $row['id_barang'];
        $nm_bar = $row['nama_barang'];
        $hrg = $row['harga_barang'];
        $qty = $_POST['qty'];
        $sql = "insert into keranjang values ('','$id','$qty','$id_user')";
        $db->query($sql);
    }

    ?>


    <div class="container pt-5">
        <div class="row">

            <div class="col-sm-6">
                <img class="card-img-top" src="gambar/<?= $row['gambar']; ?>" alt="Card image cap" class="fullwidth" />
            </div>

            <div class="col-sm-6">
                <h3 class="product-title"><?= $row['nama_barang']; ?></h3>
                <div class="garisX mb-3"></div>
                <div class="row">
                    <div class="col-3">
                        <span>Harga</span>
                    </div>
                    <div class="col">
                        <span>Rp. <?= $row['harga_barang']; ?></span>
                    </div>
                </div>

                <div class="garisX mb-3 mt-1"></div>
                <div class="row">
                    <div class="col-3">
                        <span>Jumlah</span>
                    </div>
                    <div class="col">
                        <span>Stok Tersisa <?= $row['qty']; ?></span>
                        <div class="clearfix"></div>
                        <div class="w-responsive p-0 mt-2" style="width:25%;">
                            <div class="stok">
                                <form method="POST" style="display:flex;" action="">
                                    <button type="button" class="p-1 blue darken-3 qty" id="min"><i class="fas fa-minus" style="color:white;"></i></button>
                                    <input class="mr-1 ml-1" type="text" style="border: 0px; outline:none; flex: 1; font-size: 15px; text-align:center;" name="qty" size="5" maxlength="7" value="1">
                                    <button type="button" class="p-1 blue darken-3 qty" id="plus"><i class="fas fa-plus" style="color:white;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="garisX mb-2"></div>
                <div class="row">
                    <div class="col-3">
                        <span>Deskripsi</span>
                    </div>
                    <div class="col">
                        <span><?= $row['deskripsi']; ?></span>
                    </div>
                </div>

                <div class="row float-right">
                    <button type="submit" class="btn btn-md light-blue darken-3 mt-4" name="cart" style="color:white; font-size:13px; letter-spacing:1px;"><i class="fas fa-cart-plus"></i>&nbsp Masukan Keranjang</button>
                    </form>
                </div>

            </div>

        </div>
    </div>



    <script>
        $(.stok button).change(function) {
            updateStok(this);
        }

        function updateStok(stok) {
            var row = $(stok).parent().parent();
        }
    </script>

    <!-- Javascript -->
    <script type="text/javascript" src="mdbootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="mdbootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="mdbootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="mdbootstrap/js/mdb.min.js"></script>

    <!--/.EndJavascript-->
</body>

</html>