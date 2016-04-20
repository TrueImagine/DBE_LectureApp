<?php
	$idDosen=4;
	require_once('../includes/const.php');
?>
<form action="kelas_tambah_proses.php?idDosen=<?php echo $_GET['idDosen']; ?>" method="POST">
	<label>Nama Kelas<label/>
	<input type="text" name="namaKelas">
	</br>
	<label>Deskripsi Kelas<label/>
	<input type="text" name="deskripsiKelas">
	</br>
	<input type="submit" name="tambahKelas" value="Tambah">
</form>