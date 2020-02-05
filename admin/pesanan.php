<?php
session_start();
require '../application/config.php';
require '../application/function.php';


if(!isset($_SESSION['admin'])){
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
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">No Transaksi</th>
      <th scope="col">Nama Pembeli</th>
      <th scope="col" colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <tr>  
        <td></td>
        <td></td>
        <td></td>
        <td><a href='#'><i class='fas fa-edit' style='color: green;'></i>
                </a>&nbsp<a href='#'><i class='far fa-times-circle' style='color: red;'></i>
                </a></td>
  </tr>
  </tbody>
</table>

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