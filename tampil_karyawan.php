<?php
include "koneksi/koneksi.php";
$sql_full = mysqli_query($conn,"Select * from tbl_petugas ORDER by nik ASC",$sambung); 
 
mysqli_query($conn,"ALTER TABLE tbl_petugas AUTO_INCREMENT = 1"); 
 
?>
<html><head><title>Tampil data Karyawan</title></head>
<body>
<center> 
 
<a href="input_karyawan_new.php">Input Data Karyawan&nbsp;</a>&nbsp;||&nbsp;
<a href="cari_karyawan_new.php">&nbsp;Cari Data Karyawan</a>&nbsp;||&nbsp;
<a href="tampil_karyawan_new.php"> Lihat Data Karyawan</a>&nbsp;||&nbsp;
<a href="/proyek_pranata/menu.html">Kembali</a> 
 
<form action="" method="post">
<br><br> 
 
<table border="1" cellpadding="5" cellspacing="5" width="900">
<tr bgcolor="yellow">
<th>NIK</th>






 
<th>Nama Mahasiswa</th>
<th>Alamat</th>
<th>Foto</th>
<th>Detil</th>
<th>Hapus</th>
<th>Edit</th>
 
</tr> 
 
<?php 
 
if (isset($_GET['halaman'])) {
$page = $_GET['halaman'];
} else {
$page = 1;
}

$perpage                    = 2;
$hitung                        = $perpage * $page;
$start                           = $hitung - $perpage;
$sql                              = mysqli_query($conn,"Select * from tbl_petugas ORDER by nik ASC Limit 
$start, $perpage",$sambung);
$total_hasil   = mysqli_query($conn,"select Count(*) AS nik from tbl_petugas",$sambung);
$rows_total  = mysqli_num_rows($sql_full);
$total_pages = ceil($rows_total/$perpage);
$total_pages1 = $total_pages+1; 
 
?> 
 
<?php if(mysqli_num_rows($sql)>0){ ?>
<?php
$no = 1;
while($data = mysqli_fetch_array($sql)){ 
 
if(($no % 2) == 0){
$bgcolor="#F0FFFF";
} else{
$bgcolor="pink";
} 
?>
<!-- sesuai dengan tabel pada database       seperti nik, nama, alamat, foto--> 
<?php echo "<tr bgcolor=$bgcolor>"; ?>
<td><?php echo $data["nik"];?></td>
<td><?php echo $data["nama"];?></td>
<td><?php echo $data["alamat_petugas"];?></td>
<td><img src="foto/<?php echo $data['foto_petugas']; ?>" width ="50" height="50" 
border="0"/> </td>
<td><?php echo "<a 
href='tampil_detil_kry_new.php?nik=$data[nik]'>Detil</a>"; ?></td>
<td><?php echo "<a 
href='delete_karyawan_new.php?nik=$data[nik]'>Delete</a>"; ?></td>
<td><?php echo "<a 
href='edit_karyawan_new.php?update={$data['nik']}'>Edit</a>";?></td>
</tr>
<?php $no++; } ?>
<?php } ?> 
</table>
<div class="">
<br>Halaman : 
<?php for ($i=1; $i<=$total_pages ; $i++){ ?>
<a href="?halaman=<?php echo $i; ?>"> <?php echo $i; ?></a>
<?php } ?>
<br>

<p>Jumlah Record : <?php echo $rows_total; ?> </p>
</div>
</form>
</center>
</body>
</html>
