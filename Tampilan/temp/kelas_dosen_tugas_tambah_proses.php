<!-- kelas_dosen_tugas_tambah_proses.php -->
<?php
	require_once("../includes/koneksi.php");
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		$idkelas=$_POST['idkelas'];
		//echo $idkelas;
		if(isset($_FILES['tugas']) && $_FILES['tugas']['size'] > 0){
			
			//print_r($_POST);
			//print_r($_FILES['tugas']);
			
			$tugas=$_FILES['tugas'];
			$nama=$_POST['nama'];
			$deskripsitugas	= $_POST['deskripsiTugas'];
			$tglMulaiTugas = $_POST['tglMulaiTugas'];
			$tglSelesaiTugas = $_POST['tglSelesaiTugas'];
			$namaTugas=$tugas['name'];
			$sumber=$tugas['tmp_name'];
			$ext="doc, docx, ppt, pptx, pdf";
			$maxSize = 2*1024*1024;
			
			//query nama tugas yang sama
			$sql2="SELECT * FROM tugas WHERE namaTugas='$namaTugas'";
			$hasil2=mysqli_query($k, $sql2);
			$sama=mysqli_num_rows($hasil2);
			
			if($sama){
				
			}else{
				$fileExt = strtolower(end(explode(".", $tugas['name'])));
				$ext = (explode(",", str_replace(" ", "", $ext)));
				//print_r($ext);
				//echo $fileExt;
				if(in_array($fileExt, $ext)){
					$tujuan="tugas/".$tugas['name'];
					$tujuan2=$tugas['name'];
					
					move_uploaded_file($sumber, $tujuan);
					$sql = "INSERT INTO tugas (namaTugas, deskripsiTugas, tglMulaiTugas, tglSelesaiTugas, fileTugas, tglUploadTugas, idKelas)
							VALUES('$nama', '$deskripsitugas', '$tglMulaiTugas', '$tglSelesaiTugas', '$tujuan2', '".date("Y-m-d")."', $idkelas)"; 
							
					mysqli_query($k, $sql);
					header('Location: kelas_dosen_tugas.php?idkelas='.$idkelas);
					
				}else{
					
				}
			}
		}
		else{
			$nama=$_POST['nama'];
			$deskripsitugas	= $_POST['deskripsiTugas'];
			$tglMulaiTugas = $_POST['tglMulaiTugas'];
			$tglSelesaiTugas = $_POST['tglSelesaiTugas'];
			
			$sql = "INSERT INTO tugas (namaTugas, deskripsiTugas, tglMulaiTugas, tglSelesaiTugas, tglUploadTugas, idKelas)
					VALUES('$nama', '$deskripsitugas', '$tglMulaiTugas', '$tglSelesaiTugas', '".date("Y-m-d")."', $idkelas)"; 
					
			mysqli_query($k, $sql);
			header('Location: kelas_dosen_tugas.php?idkelas='.$idkelas);
		}
	}
?>