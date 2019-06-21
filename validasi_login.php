<?php 
session_start();
require_once("/koneksi/koneksi.php");
$username  = $_POST['txt_username'];
$pass                          = $_POST['txt_password'];
$cekuser = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE username = '$username' 
and password='$pass'");
$hasil = mysqli_fetch_array($cekuser);

if(mysqli_num_rows($cekuser) == 0) {
    echo "<div align='center'>Maaf Username Belum Terdaftar! <a 
    href='login.php'>Back</a></div>";
    } else {
    if($pass <> $hasil['password']) {
    echo "<div align='center'>Maaf Password salah! <a href='login.php'>Back</a></div>";
    } else {
    $_SESSION['username'] = $hasil['username'];
    //header('location:/proyek_pranata/index.html');
    header('location:/proyek_pranata/admin/menu_admin.html');
    }
    } 
    ?>
    