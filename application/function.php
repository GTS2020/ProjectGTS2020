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
    if (isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];
    } else {
        $id_user = "";
    }
    $sql = "SELECT * from keranjang where id_user = '$id_user'";
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
    $brg = $_GET['cari'];
    $sql = "SELECT * FROM barang WHERE nama_barang like '%$brg%'";
    $stmt = $db->query($sql);
    return $stmt;
}

function checkout()
{
    global $db;

    // if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama_pembeli = $_SESSION['username'];
    // } else {
    //     $id_user = "";
    //     $nama_pembeli = "";
    // }

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
    };

    $harga_total = [];

    $barang = "select * from keranjang where id_user=$id_user";
    $hasil = $db->query($barang);
    $row = $hasil->fetch(PDO::FETCH_ASSOC);
    $test = $hasil->rowCount();
    echo $test;
    // // total harga
    // while ($row = $hasil->fetch(PDO::FETCH_ASSOC)) {
    //     $id_barang = $row['id_barang'];
    //     $sql = "select * from barang where id_barang = $id_barang ";
    //     $hasil = $db->query($sql);
    //     $result = $hasil->fetch(PDO::FETCH_ASSOC);
    //     $total = $row['qty'] * $result['harga_barang'];
    //     array_push($harga_total, $total);
    // }

    // $totalhrg = array_sum($harga_total);

    // $sql3 = "insert into pesanan values ('$final','$nama_pembeli','$totalhrg','$id_user')";
    // $db->query($sql3);

    while ($row = $hasil->fetch(PDO::FETCH_ASSOC)) {
        $id_barang = $row['id_barang'];
        $qty = $row['qty'];

        $sql1 = "INSERT into detail (id_barang, no_transaksi, nama_barang, harga_barang, qty, id_user) 
        select b.id_barang, '$final', nama_barang, harga_barang, '$qty', '$id_user' 
        from keranjang k, barang b, pesanan 
        where b.id_barang=$id_barang and no_transaksi = '$final'";
        $db->query($sql1);

        echo $sql1;

        //
        $stok = $db->query("select * from barang where id_barang = '$id_barang'");
        $fetch_stok = $stok->fetch(PDO::FETCH_ASSOC);
        $stok_lama = $fetch_stok['qty'];
        $stok_baru = $stok_lama - $qty;
        $sql2 = "UPDATE barang set qty='$stok_baru' where id_barang='$id_barang'";
        $db->query($sql2);
    }

    /*!
    $hapus =
        "DELETE from keranjang where id_user='$id_user'";
    $db->query($hapus);*/
}

function loginadmin()
{
    global $db;
    $user = $_POST['user'];
    $pass = MD5($_POST['pass']);
    $sql = "select * from useradmin where username='$user' AND password='$pass'";
    $stmt = $db->query($sql);
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['admin'] = $user;
        echo "<script> document.location.href='dashboard.php';</script>";
    }
    return $stmt->rowCount();
}


function daftPengguna()
{
    global $db;
    $sql = "select * from pengguna";
    $stmt = $db->query($sql);
    return $stmt;
}

function edPengguna()
{
    global $db;
    $peng = $_GET['pengguna'];
    $sql = "select * from pengguna where pengguna='$peng'";
    $stmt = $db->query($sql);
    return $stmt;
}


function selectEdBarang()
{
    global $db;
    $bar = $_GET['barang'];
    $sql = "select * from barang where nama_barang='$bar'";
    $stmt = $db->query($sql);

    return $stmt;
}

function edBarang()
{
    global $db;
    $nm_bar = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $desk = $_POST['deskripsi'];
    $WHEREid = $_GET['barang'];

    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    $sql = "SELECT * FROM barang WHERE nama_barang='$WHEREid'";
    $row = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    $oldgambar = $row['gambar'];

    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $row['gambar'];
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../gambar/' . $gambar);
            } else {
                echo "
            <script>
                alert('Gambar terlalu besar');
            </script>";
            }
        }
    }

    echo "<script>
                alert('Edit Data Berhasil');
                document.location.href='barang.php';
          </script>";



    $sql2 = "UPDATE barang SET nama_barang='$nm_bar',harga_barang='$harga',qty=$stok,deskripsi='$desk',gambar='$gambar' where nama_barang='$WHEREid'";
    $stmt = $db->query($sql2);
    return $db->query($sql2)->rowCount();
}


function hapusBarang()
{
    global $db;
    $id = $_GET['barang'];

    $sql = "SELECT * FROM barang WHERE nama_barang='$id'";
    $stmt = $db->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $gambar = $row['gambar'];

    echo $id;

    $sql2 = "DELETE FROM barang WHERE nama_barang='$id'";
    $db->query($sql2);
    unlink('../gambar/' . $gambar);
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href='barang.php';
            </script>";
}
