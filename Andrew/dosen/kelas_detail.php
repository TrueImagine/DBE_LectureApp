<?php
	$idDosen=4;
	require_once('../includes/const.php');
	
	$id=$_GET['idkelas'];
	
	//query nama kelas
	$sql="SELECT * FROM kelas WHERE idKelas=$id";
	$hasil=mysqli_query($k, $sql) ;
	$kelas=mysqli_fetch_assoc($hasil);
	
	$idDosen=$kelas['idDosen'];
	
	$sql2="SELECT namaUser FROM user WHERE idUser=$idDosen";
	$hasil2=mysqli_query($k, $sql2);
	$namaDosen=mysqli_fetch_assoc($hasil2);
	
?>
<a href="kelas_detail.php?idkelas=<?php echo $id; ?>">Tentang Kelas</a> | 
<a href="kelas_materi.php?idkelas=<?php echo $id; ?>">Materi</a> | 
<a href="kelas_tugas.php?idkelas=<?php echo $id; ?>">Tugas</a> | 
<a href="kelas_mahasiswa.php?idkelas=<?php echo $id; ?>">Mahasiswa</a>
</br></br>
<?php
	echo "Kelas : ".$kelas['namaKelas'];
	echo "</br></br>";
	echo "Deskripsi : ".$kelas['deskripsiKelas'];
?>
