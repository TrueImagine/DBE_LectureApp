<?php
	session_start();
	require_once("../includes/koneksi.php");
	
	//print_r($_SESSION);
	//print_r($_POST);
	
	if(isset($_POST['passwordLama']) && $_POST['passwordLama'] == true){
		$passLama = $_POST['passwordLama'];
		if(isset($_POST['password1']) && $_POST['password1'] == true){
			$pass1 = $_POST['password1'];
			if(isset($_POST['password2']) && $_POST['password2'] == true){
				$pass2 = $_POST['password2'];
				
				if($_SESSION['role'] == 'Mahasiswa'){
					$sql="SELECT passwordUser FROM user WHERE idUser=$_SESSION[user]";
					$hasil=mysqli_query($k, $sql);
					$password=mysqli_fetch_assoc($hasil);
					
					if(password_verify($passLama, $password['passwordUser'])){
						if($pass1 == $pass2){
							$pass = password_hash($pass1, PASSWORD_BCRYPT);
							$sql2= "UPDATE user SET
									passwordUser='$pass'
									WHERE idUser=$_SESSION[user]";
							echo $sql2;
							mysqli_query($k, $sql2);
							header('location: profil_mahasiswa.php');
						}
					}
				}else if($_SESSION['role'] == 'Dosen'){
					$sql="SELECT passwordUser FROM user WHERE idUser=$_SESSION[user]";
					$hasil=mysqli_query($k, $sql);
					$password=mysqli_fetch_assoc($hasil);
					
					if(password_verify($passLama, $password['passwordUser'])){
						if($pass1 == $pass2){
							$pass = password_hash($pass1, PASSWORD_BCRYPT);
							$sql2= "UPDATE user SET
									passwordUser='$pass'
									WHERE idUser=$_SESSION[user]";
							echo $sql2;
							mysqli_query($k, $sql2);
							header('location: profil_dosen.php');
						}
					}
				}
			}
		}
	}
?>