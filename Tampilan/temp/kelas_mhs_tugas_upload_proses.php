<?php
session_start();
require_once("../includes/koneksi.php");
	
	//print_r($_POST);
	$idtugas = $_POST['idtugas'];
	$iduser = $_SESSION['user'];
		
	echo "test3";
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		$idkelas=$_POST['idkelas'];
		//print_r($_FILES);
		echo "test2";
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
				echo "test";
				if($ext[0] == $fileExt || $ext[1] == $fileExt || $ext[2] == $fileExt || $ext[3] == $fileExt || $ext[4] == $fileExt){
					
				
					
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
					echo "gagal";
				}
			//}	
		}
		else{
			echo "kosong";
		}
	}
	
?>