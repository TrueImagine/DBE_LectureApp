<!-- kelas_dosen_tugas_edit_proses.php -->
<?php
	require_once("../includes/koneksi.php");
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		$idkelas=$_POST['idkelas'];
		$idtugas=$_POST['idtugas'];
		
		$query="SELECT * FROM tugas WHERE idkelas=$idkelas AND idtugas=$idtugas";
		$hasil3=mysqli_query($k, $query);
		$unlink=mysqli_fetch_assoc($hasil3);
		
		$nama=$_POST['nama'];
		$deskripsitugas	= $_POST['deskripsiTugas'];
		$tglMulaiTugas = $_POST['tglMulaiTugas'];
		$tglSelesaiTugas = $_POST['tglSelesaiTugas'];
		//echo $_FILES['tugas']['size'];
		if($_FILES['tugas']['size']>0){
			echo "test1";
			//print_r($_POST);
			//print_r($_FILES['tugas']);
			
			$tugas=$_FILES['tugas'];
			$namaTugas=$tugas['name'];
			$sumber=$tugas['tmp_name'];
			$ext="doc, docx, ppt, pptx, pdf";
			$maxSize = 2*1024*1024;
			
			//query nama tugas yang sama
			$sql2="SELECT * FROM tugas WHERE fileTugas='$namaTugas'";
			$hasil2=mysqli_query($k, $sql2);
			$sama=mysqli_num_rows($hasil2);
			
			if($sama){
				
			}else{
				$fileExt = strtolower(end(explode(".", $tugas['name'])));
				$ext = (explode(",", str_replace(" ", "", $ext)));
				//print_r($ext);
				//echo $fileExt;
				if(in_array($fileExt, $ext)){
					//echo $unlink['fileTugas'];
					unlink('tugas/'.$unlink['fileTugas']);
					$tujuan="tugas/".$tugas['name'];
					$tujuan2=$tugas['name'];
					
					move_uploaded_file($sumber, $tujuan);
					$sql = "UPDATE tugas set namaTugas= '$nama', deskripsiTugas='$deskripsitugas', tglMulaiTugas='$tglMulaiTugas', 
							tglSelesaiTugas='$tglSelesaiTugas', fileTugas='$tujuan2', tglUploadTugas='".date("Y-m-d")."', idKelas=$idkelas
							WHERE idTugas=$idtugas"; 	
					mysqli_query($k, $sql);
					header('Location: kelas_dosen_tugas_detail.php?idkelas='.$idkelas.'&idtugas='.$idtugas);
					
				}else{
					
				}
			}
		}else{
			echo "test2";
			$sql = "UPDATE tugas set namaTugas= '$nama', deskripsiTugas='$deskripsitugas', tglMulaiTugas='$tglMulaiTugas', 
					tglSelesaiTugas='$tglSelesaiTugas', tglUploadTugas='".date("Y-m-d")."', idKelas=$idkelas
					WHERE idTugas=$idtugas";
			//echo $sql;
			mysqli_query($k, $sql);
			header('Location: kelas_dosen_tugas_detail.php?idkelas='.$idkelas.'&idtugas='.$idtugas);
		}
	}
?>