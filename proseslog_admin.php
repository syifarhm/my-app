<?php
include("config.php");
session_start();
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$login = mysqli_query($mysqli, "SELECT id_admin, username, poto FROM admin WHERE email = '$email' and password = '$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0){
    $data = mysqli_fetch_assoc($login);
    $_SESSION['id_admin'] = $data['id_admin'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['poto'] = $data['poto'];
    echo "<script>alert('Login admin berhasil!')</script>";
    echo "<script>top.location = 'admin/'</script>";
} else {
    echo "<script>alert('Anda gagal bergabung!')</script>";
    echo "<script>top.location = 'index.php'</script>";
}

