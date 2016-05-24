<?php
	require_once("../includes/koneksi.php");
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		$idKelas=$_POST['idkelas'];
		//print_r($_FILES);
		if(isset($_FILES['materi']) && $_FILES['materi'] == true){
			$materi=$_FILES['materi'];
			$nama=$materi['name'];
			$ext="pdf";
			
			$sql2="SELECT * FROM materi WHERE namaMateri='$nama'";
			$hasil2=mysqli_query($k, $sql2);
			$sama=mysqli_num_rows($hasil2);
			
			if($sama){
				echo "sama";
			}else{
				$ext2 = explode(".", $nama);
				$fileExt = strtolower(end($ext2));
				if($ext == $fileExt){
					$sumber=$materi['tmp_name'];
					//echo $materi['name'];
					$tujuan="materi/".$materi['name'];
					$tujuan2=$materi['name'];
					//echo $tujuan;
					move_uploaded_file($sumber, $tujuan);
					$sql = "INSERT INTO materi (namaMateri, fileMateri, idKelas, tglUploadMateri) VALUES ('$nama', '$tujuan2', $idKelas,'".date("Y-m-d")."')";
					mysqli_query($k, $sql);
					
					$sql ="SELECT namaUser FROM user WHERE idUser=$_SESSION[user]";
					$hasil2 = mysqli_query($k, $sql);
					$dos = mysqli_fetch_assoc($hasil2);
					$sql = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah menambahkan materi baru', 1, $idKelas, '".date("Y-m-d H:i:s")."')";
					mysqli_query($k, $sql);
					
					echo $idKelas;
				}
				else{
					echo "gagal";
				}
			}	
		}
		else{
			echo "kosong";
		}
	}
	
?>