<?php
require 'functions.php';

// ambil data di url 
$id = $_GET["id"];
// var_dump($id);
// query data mahasiswa berdasarkan id

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
// var_dump($mhs["id"]);
// cek apakah tombol button sudah pernah di pencet
if( isset($_POST["submit"])) {
	//ambil data dari tiap elemen dalam form
	
	var_dump($_POST);
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
		</script>

		";
	} else { 
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php';
		</script>
";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data mahasiswa</title>
</head>
<body>
<h1>Ubah data mahasiswa</h1>
<form action="" method="post">
			<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
	<ul>
		<li>
			<label for="nrp">NRP :</label>
			<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"] ?>">
		</li>
		
		<li>
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
		</li>
		<li>
			<label for="email">Email :</label>
			<input type="text" name="email" id="email" value="<?= $mhs["email"] ?>">
		</li>
		<li>
			<label for="jurussan">Jurussan :</label>
			<input type="text" name="jurussan" id="jurussan" required value="<?= $mhs["jurusan"] ?>">
		</li>
		<li>
			<label for="gambar">Gambar :</label>
			<input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"] ?>">
		</li>
		<li>
			<button type="submit" name="submit">Ubah Data!</button>
		</li>
	</ul>

</form>
</body>
</html>