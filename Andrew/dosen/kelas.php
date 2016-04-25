<?php
	$idDosen=4;
	require_once('../includes/const.php');
	$sql="SELECT * FROM user WHERE idUser=$idDosen";
	$hasil2= mysqli_query($k, $sql);
	$nama=mysqli_fetch_assoc($hasil2);
	echo "Selamat Siang, Bapak/Ibu ".$nama['namaUser'];
	
	$query = "SELECT * FROM kelas WHERE idDosen=$idDosen";
	$hasil = mysqli_query($k, $query);
	
	?>
		<table border='1'>
		<thead>
			<tr>
				<th>Nama Kelas</th>
				<th>Jumlah Murid</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php
	$i=1;
	while ($b = mysqli_fetch_assoc($hasil)){
		$query2="SELECT * FROM kelasDtl WHERE idKelas=$b[idKelas]";
		$hasil2= mysqli_query($k, $query2);
		$jumlah= mysqli_num_rows($hasil2);
?>	
		<tr>
			<td>
				<a href="kelas_detail.php?idkelas=<?php echo $b['idKelas']?>"><?php echo $b['namaKelas']; ?></a>
			</td>
			<td> 
				<?php echo $jumlah; ?>
			</td>
			<td>
				<?php
					if($b['statusKelas']==0){
						echo "Tidak Aktif";
					}else{
						echo "Aktif";
					}
				?>
				
			</td>
			<td>
				<?php 
					if($b['statusKelas']==1){
				?>
						<form action='kelas_nonaktif.php?idKelas=<?php echo $b['idKelas'] ?>' method='POST'>
							<input type="submit" name="nonaktifkanKelas" value="Tidak Aktif" />
						</form>
				<?php
					}else{
				?>
						<form action='kelas_aktif.php?idKelas=<?php echo $b['idKelas'] ?>' method='POST'>
							<input type="submit" name="aktifkanKelas" value="Aktif" />
						</form>
				<?php
					}
				?>
			</td>
		</tr>
<?php
		$i++;
	}
?>
	</tbody>
	</table>
	<a href='kelas_tambah.php?idDosen=<?php echo $idDosen ?>'>+Tambah Kelas</a>