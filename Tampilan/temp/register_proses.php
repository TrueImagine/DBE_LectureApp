<?php
	session_start();
	require_once("../includes/koneksi.php");
	$action = $_GET['action'];
	$captcha = $_POST['captcha'];
	if(isset($_POST['submit'])){
		if($_SESSION['captcha']==$_POST['captcha']){ //jika captcha sesuai
			if($action=="register")		
			{$nama	= $_POST['nama'];}
			$email	= $_POST['email'];
			$tanggalL	= $_POST['tanggallahir'];	
			$ex = explode("-",$tanggalL);
			$password = $ex[2].$ex[1].substr($ex[0],2,2); //password login ddmmyy
			$encrypted_pass	= password_hash($password, PASSWORD_BCRYPT); //encrypt password
			if($action=="register"){ //untuk register baru
				//validasi duplikat data
				$sql = "SELECT emailUser FROM user WHERE emailUser='$email'";
				$hasil = mysqli_query($k, $sql);
				if(mysqli_num_rows($hasil)){
					echo "1";
				}else{
				$sql = "INSERT INTO user (namaUser, passwordUser, emailUser, tglLahirUser, fotoUser, status) VALUES ('$nama', '$encrypted_pass', '$email', '$tanggalL', '', 0)";
				mysqli_query($k, $sql);
					echo "3";
				}
			}else{ //untuk lupa password
				$sql = "SELECT emailUser, tglLahirUser FROM user WHERE emailUser='$email' and tglLahirUser='$tanggalL'";
				$hasil = mysqli_query($k, $sql);
				if(mysqli_num_rows($hasil)){
					$sql= "UPDATE user SET passwordUser = '$encrypted_pass'";
					mysqli_query($k, $sql);
					echo "3";
				}else{
					echo "1";			
				}
			}
		}else{		//ajax captcha salah		
				echo "2";			
		}
	}
