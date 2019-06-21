<?php
include "/koneksi/koneksi.php"; 
 
//Tangkap nik
if (isset($_GET['nik'])) {
$nik = $_GET['nik']; 
 
// membaca nama file yang akan dihapus
$query  = "SELECT * FROM tbl_petugas WHERE nik='$nik'";
$hasil  = mysql_query($query);
}
else {
die ("Error. Tidak ada nik yang dipilih Silakan cek kembali! ");
}
//proses hapus data
if (!empty($nik) && $nik != "") {
$hapus = "DELETE FROM tbl_petugas WHERE nik='$nik'";
$sql = mysql_query ($hapus);
if ($sql) {
?>
<script language="JavaScript">
alert('Data Karyawan <?=$nik?> Berhasil dihapus!');


 
document.location='tampil_karyawan_new.php?page=lihat';
</script>
 
<?php 
} else {
echo "<font color=red><center>Data Karyawan gagal dihapus</center></font>"; 
}
} 
 
?>
