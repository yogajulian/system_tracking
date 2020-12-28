<?php 
session_start();

if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if(isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah data mahasiswa</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
</form>
<br>
<table border="1" cellpading="10" cellspacing="0"> 

<tr>
	<th>No.</th>
	<th>Aksi</th>
	<th>Gambar</th>
	<th>NRP</th>
	<th>Nama</th>
	<th>Email</th>
	<th>Jurusan</th>
</tr>
<td><?php $i = 1; ?></td>
<?php foreach( $mahasiswa as $row) : ?>
<tr>
	<td><?= $i;	 ?></td>
	<td>
		<a href="ubah.php?id=<?=$row["id"];?>">ubah</a> 
		<a href="hapus.php?id=<?=$row["id"];?>" onclick=" return confirm
		('yakin?')">hapus</a>
	</td>
	<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
	<td><?= $row["nrp"]; ?></td>
	<td><?= $row["nama"]; ?></td>
	<td><?= $row["email"]; ?></td>
	<td><?= $row["jurusan"]; ?></td>
</tr>
<?php $i++;	 ?>
<?php endforeach; ?>

</table>

<script src="js/script.js"></script>
</body>
</html>