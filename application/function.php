<?php
require 'config.php';

function login()
{
    global $db;
    $user = $_POST['user'];
    $pass = md5($_POST['password']);
    $sql = "select id_user, email,username from pengguna where email='$user' || username='$user' && password='$pass'";
    $stmt = $db->query($sql);
    $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($hasil > 0) {
        $_SESSION['username'] = $user;
        $_SESSION['id_user'] = $hasil['id_user'];
        echo "<script> document.location.href='index.php';</script>";
    }
    return $stmt->rowCount();
}

function register()
{
    global $db;
    $nama = $_POST['user'];
    $email = $_POST['email'];
    $telp = $_POST['Telp'];
    $password = md5($_POST['password']);
    $sql = "insert pengguna values ('','$email','$password','$nama','$telp')";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}


function barang()
{
    global $db;
    $sql = "SELECT * from barang";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt;
}

function getBarang()
{
    global $db;
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT * from keranjang where id_user = $id_user";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt;
}

function addBarang()
{
    global $db;
    $nm_bar = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $desk = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];


    $sql = "insert barang values('','$nm_bar','$harga','$stok','$desk','$gambar')";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}


function search()
{
    global $db;
}

function checkout()
{
    global $db;
    $id_user = $_SESSION['id_user'];
    $sql = "select * from keranjang id_user = $id_user";
    $query = $db->query($sql);
    $hasil = $query->fetch(PDO::FETCH_ASSOC);

    $nama_pembeli = $_SESSION['username'];
    $id_user = $_SESSION['id_user'];

    $sql = "SELECT no_transaksi from pesanan";
    $result = $db->query($sql);
    $no_tr = "C001";
    if ($result->rowCount() == 0) {
        $final = $no_tr;
    }

    $count = $result->rowCount();
    $counter = 0;
    while (list($no_tr) = $result->fetch()) {
        if (++$counter == $count) {
            $no_tr++;
            $final = $no_tr;
        }
    }

    $sql = "insert into pesanan values ('','$nama_pembeli','','')";
}
