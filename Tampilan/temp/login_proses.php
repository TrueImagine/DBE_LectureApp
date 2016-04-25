<?php
	session_start();
	require_once("../includes/koneksi.php");
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$sql = "SELECT * FROM user WHERE emailUser = '$user'";
	$hasil = mysqli_query($k, $sql);
	
	
	$data = mysqli_fetch_array($hasil);
	if(mysqli_num_rows($hasil)){	
		if(password_verify($pass, $data['passwordUser'])){
			$_SESSION['login'] = true;
			$_SESSION['user'] = $data['idUser'];
			if($data['status'] == 0){ //dosen
				$_SESSION['role'] = "Dosen";	
				header('Location: dosen.php');
			}
			else{
				$_SESSION['role'] = "Mahasiswa";
				header('Location: mahasiswa.php');
			}
		}
		else{
			echo "<script>alert('Email / Password Anda Salah!'); window.location='../index.php';</script>";						
		}
	}else{		
		echo "<script>alert('Email / Password Anda Salah!'); window.location='../index.php';</script>";						
	}