<?php
session_start();
require_once("../includes/koneksi.php");
require_once("../includes/functions.php");


if(isset($_POST['upload'])){
	if(!isset($_FILES["profile"])){
		$response = 1;
		echo $response;
	}
	else{
		$foto = $_FILES['profile'];
		$ext = "jpg, jpeg, png, gif";

		$a = check_file_extension($foto['name'], $ext);
		if($a){
			$sumber = $foto['tmp_name'];
			if(!file_exists('../images/fulls/temp')){
				mkdir('../images/fulls/temp',0777,true);
			}
			$tujuan = "../images/fulls/temp/foto_".$_SESSION['user'].".".end(explode(".",$foto['name']));
			move_uploaded_file($sumber,$tujuan);
			$response = $tujuan;
			echo $response;
		}
		else{
			echo 1;
		}
	}
}
else if(isset($_SESSION['login']) && $_SESSION['role'] == "Mahasiswa" && isset($_POST['simpan'])){
	$nama = $_POST['nama'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$email = $_POST['email'];
	
	$file_path = $_POST['hidpath'];
	if($file_path != ""){
		$new_file_path = "../images/fulls/foto/".end(explode("/",$file_path));
		rename($file_path, $new_file_path);
	}
	else{
		$new_file_path = $file_path;
	}
	$sql = "UPDATE user SET
		namaUser = '$nama',
		emailUser = '$email',
		tglLahirUser = '$tgl_lahir',
		fotoUser = '$new_file_path' WHERE idUser = $_SESSION[user]";
	mysqli_query($k,$sql);

	if(mysqli_error($k)){
		die(mysqli_error($k));
	}
	else{
		echo "2";
	}
}
else{
	header('Location: index.php');
}