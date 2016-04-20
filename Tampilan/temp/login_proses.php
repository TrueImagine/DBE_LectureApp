<?php
	session_start();
	require_once("../includes/koneksi.php");
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	echo $user;
	echo $pass;
	$sql = "SELECT * FROM user WHERE emailUser = '$user'";
	$hasil = mysqli_query($k, $sql);
	
	//print_r( mysqli_fetch_array($hasil));
	
	$data = mysqli_fetch_array($hasil);
if(mysqli_num_rows($hasil)){	
	if($pass==$data['passwordUser']){
		$_SESSION['login'] = 1;
		if($data['status']==1){
			header('Location: mahasiswa.php');
		}else{
			header('Location: dosen.php');
		}
	}
	else{
		$_SESSION['login'] = null;
		echo "Username not found";
		//echo $data['passwordUser'];
	}
}else{
	$_SESSION['login'] = null;
	echo "Username not found";
}