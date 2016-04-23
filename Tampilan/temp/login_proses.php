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
			$_SESSION['user'] = $data['id'];
			$_SESSION['role'] = $data['status'];
			if($data['login']==true){
				header('Location: mahasiswa.php');
			}else{
				header('Location: dosen.php');
			}
		}
		else{
			echo "<script>alert('Email / Password Anda Salah!'); window.location='../index.php';</script>";						
		}
	}else{		
		echo "<script>alert('Email / Password Anda Salah!'); window.location='../index.php';</script>";						
	}