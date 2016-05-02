<?php
require_once("../includes/koneksi.php");
/*
Dummy data
*/
	$_SESSION['login'] = true;
	$_SESSION['user'] = 5;
	$_SESSION['role'] = "Mahasiswa";
/*
	Dummy data
*/
	$idtugas = $_POST['idtugas'];
	$iduser = $_SESSION['user'];
	$idhasil = $_POST['idhasil'];
	
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		$idkelas=$_POST['idkelas'];
		//print_r($_FILES);
		if(isset($_FILES['tugas']) && $_FILES['tugas'] == true){
			$tugas=$_FILES['tugas'];
			$nama=$tugas['name'];
			$ext=array("pdf","docx","doc","ppt","pptx");
			
			/*$sql2="SELECT * FROM materi WHERE namaMateri='$nama'";
			$hasil2=mysqli_query($k, $sql2);
			$sama=mysqli_num_rows($hasil2);
			
			if($sama){
				echo "sama";
			}else{*/
				$fileExt = strtolower(end(explode(".", $tugas['name'])));
				if($ext[0] == $fileExt || $ext[1] == $fileExt || $ext[2] == $fileExt || $ext[3] == $fileExt || $ext[4] == $fileExt){
					$sumber=$tugas['tmp_name'];
					//echo $materi['name'];
					$tujuan="tugas/".$tugas['name'];
					//echo $tujuan;
					move_uploaded_file($sumber, $tujuan);
					$sql1 = "SELECT * FROM hasiltgs WHERE idTugas = $idtugas and idUser=$iduser";
					
					$hasil1 = mysqli_query($k,$sql1);
					
					if(mysqli_num_rows($hasil1) == 0)
					{
					$sql = "INSERT INTO hasiltgs (idTugas, idUser, idKelas,fileHasiltgs, tglUploadHasiltgs)
							VALUES ($idtugas,$iduser,$idkelas,'$tujuan','".date("Y-m-d")."')";
					//$asd = 2;
					}
					else{
					$sql = "UPDATE hasiltgs SET idTugas = $idtugas, idUser = $iduser, 
							idKelas = $idkelas,fileHasiltgs = '$tujuan', tglUploadHasiltgs = '".date("Y-m-d")."'
							WHERE idHasiltgs = $idhasil";		
					//echo $sql;
					//$asd = 1;
					}
					mysqli_query($k, $sql);
					echo $asd;
					header('Location: kelas_mhs_tugas_detail.php?idkelas='.$_POST['idkelas'].'&idtugas='.$_POST['idtugas']);
				}
				else{
					echo "gagal";
				}
			//}	
		}
		else{
			echo "kosong";
		}
	}
	
?>