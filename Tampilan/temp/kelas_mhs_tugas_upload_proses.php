<?php ob_start(); ?>
<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
require_once("../includes/koneksi.php");
require_once("../includes/functions.php");
include("../includes/head_mahasiswa.php");
include("../includes/side_mahasiswa.php");
	
	//print_r($_POST);
	$idtugas = $_POST['idtugas'];
	$iduser = $_SESSION['user'];
		
	
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){	
		$idkelas=$_POST['idkelas'];
		//print_r($_FILES);
		
		if(isset($_FILES['tugas']) && $_FILES['tugas'] == true){
			$tugas=$_FILES['tugas'];
			$nama=$tugas['name'];
			
			$sql2="SELECT extTugas FROM tugas WHERE idTugas='$idtugas'";
			$hasil2=mysqli_query($k, $sql2);
			$b=mysqli_fetch_assoc($hasil2);
			$ext=$b['extTugas'];
				
				$a = check_file_extension($tugas['name'],$ext);
				if($a){					
					$sumber=$tugas['tmp_name'];
					//echo $materi['name'];
					$tujuan="hasiltgs/".$tugas['name'];
					$tujuan2=$tugas['name'];
					move_uploaded_file($sumber, $tujuan);
					
					$sqlk = "SELECT namaTugas FROM tugas WHERE idTugas = $idtugas";
					$hasilk = mysqli_query($k, $sqlk);
					$nTugas = mysqli_fetch_assoc($hasilk);
					
					$sqll ="SELECT namaUser FROM user WHERE idUser=$iduser";
					$hasill = mysqli_query($k, $sqll);
					$dos = mysqli_fetch_assoc($hasill);
					
					$sql1 = "SELECT * FROM hasiltgs WHERE idTugas = $idtugas and idUser=$iduser";
					$hasil1 = mysqli_query($k,$sql1);
					$a = mysqli_fetch_assoc($hasil1);
					
					
					if(mysqli_num_rows($hasil1) == 0)
					{
					$sql = "INSERT INTO hasiltgs (idTugas, idUser, idKelas,fileHasiltgs, tglUploadHasiltgs)
							VALUES ($idtugas,$iduser,$idkelas,'$tujuan2','".date("Y-m-d")."')";
					$sqld = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah melakukan upload tugas $nTugas[namaTugas]', 0, $idkelas, '".date("Y-m-d H:i:s")."')";
					$asd = 2;
					}
					else{
					unlink('hasiltgs/'.$a['fileHasiltgs']);
					$sql = "UPDATE hasiltgs SET idTugas = $idtugas, idUser = $iduser, 
							idKelas = $idkelas,fileHasiltgs = '$tujuan2', tglUploadHasiltgs = '".date("Y-m-d")."'
							WHERE idHasiltgs = $a[idHasiltgs]";
					$sqld = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah melakukan update upload tugas $nTugas[namaTugas]', 0, $idkelas, '".date("Y-m-d H:i:s")."')";
					$asd = 1;
					}
					echo $sql;
					mysqli_query($k, $sql);
				
					
					mysqli_query($k, $sqld);
					
					$redirect = 'Location:kelas_mhs_tugas_detail.php?idKelas='.$idkelas.'&idtugas='.$idtugas;
					//echo $redirect;
					
					header($redirect);
				}
				else{
					?>
					<div id="page-wrapper">
					<label>"Gagal ! Jenis File yang Kamu Upload Tidak Sesuai Dengan Yang Diminta Dosen"</label>
					
					
					<a href="kelas_mhs_tugas_detail.php?idKelas=<?php echo $idkelas?>&idtugas=<?php echo $idtugas?>">Kembali </a>
					</div>
					<?php
					
				}
		}
		
	}else{
		echo "kosong";
}
include("../includes/bottom.php");	
?>
<?php ob_flush(); ?>