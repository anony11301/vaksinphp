<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' and password='$password' ");
$cek = mysqli_num_rows($login);

if($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if($data['level']=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:admin.php");

    }else if($data['level']=="user") {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:index.php");
        
    }else {
        //alihkan kembali jika gagal
        header("location:login.php?pesan=gagal");
    }
}else{
    header("location:login.php?pesan=gagal");
}

?>