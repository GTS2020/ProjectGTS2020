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

<div class="container-fluid pt-5">
<div class="col-md-11 offset-md-2 mt-5">
<div class="card bg-light w-75">
  <div class="card-header"><h3>Welcome, admin</h3></div>
  <div class="card-body">
    <p class="card-text">Selamat Datang di halaman Dasboard</p>
  </div>
</div>
</div>
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