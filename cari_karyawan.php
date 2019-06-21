<?php
include "koneksi/koneksi.php";
$hasil=mysqli_query($conn,"Select * from tbl_petugas ORDER BY nik ASC ", $sambung) or die
("Query gagal dibuka". mysql_error());
?>
<html><head><title>Cari Data Karyawan</title></head>
<body> 
<center>
<table><tr><td>
<a href="input_karyawan_new.php">Input Data Karyawan&nbsp;</a>&nbsp;||&nbsp;
<a href="cari_karyawan_new.php">&nbsp;Cari Data Karyawan</a>&nbsp;||&nbsp;
<a href="tampil_karyawan_new.php"> Lihat Data Karyawan</a>&nbsp;||&nbsp;
<a href="/proyek_pranata/menu.html">Kembali</a>
</td></tr>
</table>
<br>
<br> 
<form name="form1" method="get" action="">
Search : <input type="text" name="qcari" id="qcari"/>
<input type="submit" value="Search"/>
<a href="cari_karyawan.php"><input type="submit" value="Clear"/></a>
</form>
<!-- menampilkan hasil pencarian --> 
<table border="1" cellpadding="5" cellspacing="5" width="900">
<tr bgcolor="yellow"> 
<th>NIK</th>
<th>Nama Karyawan</th>
<th>Alamat</th> 
<th>Foto</th>
<th>Detil</th>
<th>Hapus</th>
 
<th>Edit</th>
 
</tr> 
 
<?php
if(isset($_GET['qcari']) && $_GET['qcari']){
$qcari = $_GET['qcari']; 
$sql = "select * from tbl_petugas where nik like '%$qcari%' or nama like '%$qcari%' or
alamat_petugas like '%$qcari%' ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
?> 
 
<?php
while($data_karyawan = mysqli_fetch_array($result)){?>
<tr>
<td><?php echo $data_karyawan['nik'];?></td>
<td><?php echo $data_karyawan['nama'];?></td>
<td><?php echo $data_karyawan['alamat_petugas'];?></td>
<td><img src="foto/<?php echo 
$data_karyawan['foto_petugas']; ?>" width ="50" height="50" border="0"/>
</td>
<td><?php echo "<a 
href='tampil_detil_kry_new.php?nik=$data_karyawan[nik]'>Detil</a>"; ?></td>
<td><?php echo "<a 
href='delete_karyawan_new.php?NIM=$data_karyawan[nik]'>Delete</a>"; ?></td>
<td> <?php echo "<a 
href='edit_karyawan_new.php?update={$data_karyawan['nik']}'>Edit</a>";?></td>
</tr> 
<?php }?> 
 
</table>
 
<?php
} 
else{
echo 'Data tidak ditemukan!'; 
}
}
?> 
</center>
</body>
</html>
