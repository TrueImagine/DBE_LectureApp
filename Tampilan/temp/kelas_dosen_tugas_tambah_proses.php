<!-- kelas_dosen_tugas_tambah_proses.php -->
<?php
	session_start();
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
			$ext1 = $_POST['file_ext1'];
			$ext2 = $_POST['file_ext2'];
			$ext3 = $_POST['file_ext3'];
			$ext4 = $_POST['file_ext4'];
			$ext5 = $_POST['file_ext5'];
			$ext6 = $_POST['file_ext6'];
			$ext7 = $_POST['file_ext7'];
			$extfile = "";
			$maxSize = 2*1024*1024;
			
			if($ext1){
				$extfile = $extfile."doc,";	
			}
			if($ext2){
				$extfile = $extfile."docx,";	
			}
			if($ext3){
				$extfile = $extfile."xls,";	
			}
			if($ext4){
				$extfile = $extfile."xlsx,";	
			}
			if($ext5){
				$extfile = $extfile."pdf,";	
			}
			if($ext6){
				$extfile = $extfile."ppt,";	
			}
			if($ext7){
				$extfile = $extfile."pptx";	
			}
			
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
					$sql = "INSERT INTO tugas (namaTugas, deskripsiTugas, tglMulaiTugas, tglSelesaiTugas, fileTugas, extTugas, tglUploadTugas, idKelas)
							VALUES('$nama', '$deskripsitugas', '$tglMulaiTugas', '$tglSelesaiTugas', '$tujuan2', '$extfile' , '".date("Y-m-d")."', $idkelas)"; 
							
					mysqli_query($k, $sql);
					$sql ="SELECT namaUser FROM user WHERE idUser=$_SESSION[user]";
					$hasil2 = mysqli_query($k, $sql);
					$dos = mysqli_fetch_assoc($hasil2);
					$sql = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah menambahkan tugas baru dengan judul $nama!', 1, $idkelas, '".date("Y-m-d")."')";
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
			
			$sql ="SELECT namaUser FROM user WHERE idUser=$_SESSION[user]";
			$hasil2 = mysqli_query($k, $sql);
			$dos = mysqli_fetch_assoc($hasil2);
			
			$sql = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah menambahkan tugas baru dengan judul $nama!', 1, $idkelas, '".date("Y-m-d")."')";
			mysqli_query($k, $sql);
			header('Location: kelas_dosen_tugas.php?idkelas='.$idkelas);
		}
	}
?>