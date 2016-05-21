<?php
//kelas_dosen_mahasiswa_tambah_file.php
	session_start();
	require_once("../includes/koneksi.php");
	require_once("../includes/functions.php");
	require_once("../Classes/PHPExcel.php");
	require_once("../Classes/PHPExcel/IOFactory.php");
	
if(isset($_SESSION['login']) && $_SESSION['role'] == "Dosen" && isset($_POST['import'])){
	if(!isset($_FILES["excel"])){
		$response = 1;
		echo $response;
	}
	else{
		$file = $_FILES['excel'];
		$ext = "xls, xlsx";
		$idKelas = $_POST['idkelas'];
		$a = check_file_extension($file['name'], $ext);
		if($a){
			$sumber = $file['tmp_name'];
			if(!file_exists('../doc/')){
				mkdir('../doc/',0777,true);
			}
			$tujuan = "../doc/$file[name]";
			move_uploaded_file($sumber,$tujuan);
			
			$objPHPExcel = new PHPExcel();
			$objPHPExcel = PHPExcel_IOFactory::load("$tujuan");
			$objWorksheet = $objPHPExcel->getSheet(0);
			
			foreach ($objWorksheet->getRowIterator() as $row) {
				$cellIterator = $row->getCellIterator();
				foreach ($cellIterator as $cell) {
					if($cell->getValue()){ //jika selnya punya isi
						$email = $cell->getValue(); //ambil nilainya
						$pos = strpos($email, "@"); //cek apakah dia email (punya @)
						if($pos == true){ //jika email
							$sql4="SELECT * FROM user WHERE emailUser= '$email'";
							$hasil2=mysqli_query($k, $sql4);
							
							if(mysqli_num_rows($hasil2)>0){
								$user=mysqli_fetch_assoc($hasil2);
								$idMhs = $user['idUser'];
							}else{
								$password = password_hash($email, PASSWORD_BCRYPT);
								$sql = "INSERT INTO user (emailUser, passwordUser, status)
										VALUES('$email', '$password', 1)";
								//echo $sql;
								mysqli_query($k, $sql);
								
								$sql2 = "SELECT * FROM user where emailUser = '$email'";
								//echo $sql2;
								$hasil=mysqli_query($k , $sql2);
								$user=mysqli_fetch_assoc($hasil);
								$idMhs = $user['idUser'];
							}
							$sqls = "SELECT * FROM kelasdtl WHERE idKelas = $idKelas AND idMhs = $idMhs";
							$chk = mysqli_query($k,$sqls);
							if(mysqli_num_rows($chk) == 0){
								$sql3 = "INSERT INTO kelasdtl (idKelas, idMhs)
											VALUES($idKelas, $idMhs)";
								mysqli_query($k, $sql3);
							}
						}
					}
				}
			}
			unlink($tujuan);
			echo "2";
		}
		else{
			echo 1;
		}
	}
}
else{
	header('Location: ../index.php');
}