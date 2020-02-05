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
            box-model: border-box;
            background-clip: padding-box;
        }
    </style>

</head>

<body>

    <?php
    require 'header.php';
    ?>


    <!-- Product -->

    <div class="container-fluid p-4">
        <h5>Daftar Barang</h5>
        <div class="garisX mb-1"></div>
        <div class="row">
            <?php
            $barang = barang();
            while ($row = $barang->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <!-- Barang list -->
                <div class="col-2 mb-3 box">
                    <div class="w-100 h-75">
                        <a href="detail.php?id=<?= $row['nama_barang']; ?>">
                            <div class="card mt-3 p-1">
                                <img class="card-img-top" src="gambar/<?= $row['gambar']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h6 class="card-title text-muted ml-n3 mt-n3" style="color:black"><?= $row['nama_barang']; ?></h6>
                                    <h6 class="card-subtitle ml-n3 mt-n2" style="color:#0277bd;">Rp. <?= $row['harga_barang']; ?></h6>
                                    <p class="card-text"></p>
                                    <button type="button" class="btn btn-blue darken-4 btn-sm mr-n3 mb-n3 mt-n3 pl-2 pr-2 float-right">Lihat Detail</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>


            <!-- Barang list -->

        </div>
    </div>

    <!--/.Product-->

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