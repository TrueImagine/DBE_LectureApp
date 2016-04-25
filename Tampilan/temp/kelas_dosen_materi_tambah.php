<?php
	require_once("../includes/koneksi.php");
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
				$fileExt = strtolower(end(explode(".", $materi['name'])));
				if($ext == $fileExt){
					$sumber=$materi['tmp_name'];
					//echo $materi['name'];
					$tujuan="materi/".$materi['name'];
					//echo $tujuan;
					move_uploaded_file($sumber, $tujuan);
					$sql = "INSERT INTO materi (namaMateri, fileMateri, idKelas, tglUploadMateri) VALUES ('$nama', '$tujuan', $idKelas,'".date("Y-m-d")."')";
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