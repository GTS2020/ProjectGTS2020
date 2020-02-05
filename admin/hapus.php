<?php
session_start();
require '../application/config.php';
require '../application/function.php';

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}
?>