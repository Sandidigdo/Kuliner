<!DOCTYPE html>
<html>
<head>
<title>Update Data tbl_petugas</title>
</head>
<body>
<center>
<?php
include "/koneksi/koneksi.php"; 
 
if (isset($_GET['submit'])) {
$nik                                              = $_GET['nik'];
$nama                                                       = $_GET['nama'];
$alamat_petugas        = $_GET['alamat_petugas'];
//$JABATAN                             = $_GET['JABATAN'];
//$LOGIN                                                = $_GET['LOGIN'];
//$PASSWORD                                      = $_GET['PASSWORD']; 
 
$query = mysqli_query($conn,"update tbl_petugas set
nik='$nik', nama='$nama', alamat_petugas='$alamat_petugas' where nik='$nik'",
$sambung);
}
$query = mysqli_query($conn,"select * from tbl_petugas", $sambung);
?>
</div> 
 
<?php
if (isset($_GET['update'])) { 
$update = $_GET['update'];
$query_1 = mysqli_query($conn,"select * from tbl_petugas where nik=$update", $sambung);
while ($row1 = mysqli_fetch_array($query_1)) {
echo "<form class='form' method='get' enctype='multipart/form-data'>";
echo "<h2>Update Form tbl_petugas</h2>";
echo "<hr/>";
echo "<table>";
echo "<tr><td>nik </td> <td>:</td> <td><input class='input' type='text' name='nik'
value='{$row1['nik']}' /> </td></tr>";
echo "<tr><td>Nama tbl_petugas </td> <td>:</td> <td><input class='input' type='text'
name='nama' value='{$row1['nama']}' /></td></tr>";
echo "<tr><td>Alamat tbl_petugas </td><td>:</td> <td> <input class='input' type='text'
name='alamat_petugas' value='{$row1['alamat_petugas']}'/> </td></tr>";

echo "<tr><td> </td></tr>";
echo "<tr><td align='right'><input class='submit' type='submit' name='submit'
value='update' /> </td><td> | </td><td><input type='submit' name='submit'
value='Kembali' /></td></tr>";
echo "<table>";
echo "<br />";
echo "<br />";
echo "</form>";
}
}
if (isset($_GET['submit'])) {
echo '<div class="form3" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
header("location:tampil_karyawan_new.php");
}
?>
</center>
</body>
</html>
