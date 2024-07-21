<?php
include("config.php");
$email = $_POST['email'];
$password = md5($_POST['password']);
//md5 berguna utk enkripsi
//password tdk bisa pke angka!

echo $username . "-" . $email . "-" . $password;

$sql = "SELECT id_relawan, username, poto FROM relawan WHERE email = '$email' AND password = '$password'";
$query = mysqli_query($mysqli, $sql) or die("Tidak Ada Databse");
$data = mysqli_fetch_array($query);
$row = mysqli_num_rows($query);

session_start();
$_SESSION['id_relawan'] = $data['id_relawan'];
$_SESSION['username'] = $data['username'];
$_SESSION['poto'] = $data['poto'];

if ($row == 1) {
    echo "<script>alert('Login relawan berhasil!')</script>";
    echo "<script>top.location = 'relawan/'</script>";
} else {
    echo "<script>alert('Anda gagal bergabung!')</script>";
    echo "<script>top.location = 'index.php'</script>";
}
