<?php
session_start();
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
					$sql1 = "SELECT * FROM hasiltgs WHERE idTugas = $idtugas and idUser=$iduser";
					
					$hasil1 = mysqli_query($k,$sql1);
					$a = mysqli_fetch_assoc($hasil1);
					
					
					if(mysqli_num_rows($hasil1) == 0)
					{
					$sql = "INSERT INTO hasiltgs (idTugas, idUser, idKelas,fileHasiltgs, tglUploadHasiltgs)
							VALUES ($idtugas,$iduser,$idkelas,'$tujuan2','".date("Y-m-d")."')";
							
					$asd = 2;
					}
					else{
					unlink('hasiltgs/'.$a['fileHasiltgs']);
					$sql = "UPDATE hasiltgs SET idTugas = $idtugas, idUser = $iduser, 
							idKelas = $idkelas,fileHasiltgs = '$tujuan2', tglUploadHasiltgs = '".date("Y-m-d")."'
							WHERE idHasiltgs = $a[idHasiltgs]";		
					$asd = 1;
					}
					echo $sql;
					mysqli_query($k, $sql);
					
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