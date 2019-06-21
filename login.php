<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_now = date('l, d F Y - H : i : s ');
echo "<center>$tgl_now</center>";
session_start();
if(isset($_SESSION['username'])) {
header('/proyek_pranata/index.html');
require_once("koneksi/koneksi.php");
}
?> 
 
<html>
<title>Form Login</title>
<div align='center'>
<form action="validasi_login.php" method="post">
<h1>Masuk</h1>
<table>
<tbody>
<tr><td>Username</td><td> : <input name="txt_username" type="text"></td></tr>
<tr><td>Password</td><td> : <input name="txt_password" type="text"></td></tr>
<tr><td colspan="2" align="right"><input value="Login" type="submit">
<input value="Batal" type="reset"></td></tr>
</tbody>
</table>
</form>
<a href="/proyek_pranata/menu_depan.html">Kembali</a>
</div>
</html> 
 