<?php
	$idDosen=4;
	require_once('../includes/const.php');

	$id=$_GET['idkelas'];
	
	//query materi
	$sql="SELECT * FROM materi WHERE idKelas=$id";
	$hasil=mysqli_query($k, $sql);
	
?>
<table border='1'>
<tbody>
<?php
	WHILE($materi=mysqli_fetch_assoc($hasil)){
?>
<tr>
	<td><?php echo $materi['namaMateri']; ?></td>
	<td>
		<form action='kelas_materi_delete_proses.php?idmateri=<?php echo $materi['idMateri']; ?>&idkelas=<?php echo $id ?>' method='POST'>
		<input type="submit" name="deletemateri" value="Hapus" />
	</form></td>
</tr>
<?php
	}
?>
</table>
<a href="kelas_materi_tambah.php?idkelas=<?php echo $id; ?>">+Tambah Materi</a>
