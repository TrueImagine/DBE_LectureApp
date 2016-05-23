<?php
	require_once("../includes/koneksi.php");
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		
		$idKelas=$_POST['idkelas'];
		$email=(explode(",", str_replace(" ", "", $_POST['emailMahasiswa'])));
		//print_r($email);
		
		$i=0;
		while(each($email)){
			$pos = strpos($email[$i], "@"); //cek apakah dia email (punya @)
			if($pos == true){ //jika email
				$sql4="SELECT * FROM user WHERE emailUser= '$email[$i]'";
				$hasil2=mysqli_query($k, $sql4);
				
				if(mysqli_num_rows($hasil2)>0){
					$user=mysqli_fetch_assoc($hasil2);
					$idMhs = $user['idUser'];
				}else{
					$password = password_hash($email[$i], PASSWORD_BCRYPT);
					$sql = "INSERT INTO user (emailUser, passwordUser, status)
							VALUES('$email[$i]', '$password', 1)";
					//echo $sql;
					mysqli_query($k, $sql);
					
					$sql2 = "SELECT * FROM user where emailUser = '$email[$i]'";
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
					
					$sql ="SELECT namaUser FROM user WHERE idUser=$_SESSION[user]";
					$hasil2 = mysqli_query($k, $sql);
					$dos = mysqli_fetch_assoc($hasil2);
					$sql = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah menambah mahasiswa baru', 1, $idKelas, '".date("Y-m-d H:i:s")."')";
					mysqli_query($k, $sql);
				}
			}
			$i++;
		}  
		header('Location: kelas_dosen_mahasiswa.php?idkelas='.$idKelas);
	
	
	}

?>