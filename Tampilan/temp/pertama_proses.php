<?php
	require_once("../includes/koneksi.php");
	//print_r($_POST);

	if(isset($_POST['namaUser']) && $_POST['namaUser'] == true){
		if(isset($_POST['password1']) && $_POST['password1'] == true){
			if(isset($_POST['password2']) && $_POST['password2'] == true){
				if(isset($_POST['idMhs']) && $_POST['idMhs'] == true){
					$idMhs = $_POST['idMhs'];
					$namaUser = $_POST['namaUser'];
					$password1 = $_POST['password1'];
					$password2 = $_POST['password2'];
					
					$password1 = password_hash($password1, PASSWORD_BCRYPT);
					$password2 = password_hash($password2, PASSWORD_BCRYPT);
					
					if($password1=$password2){
						$sql = "UPDATE user
								SET namaUser='$namaUser', passwordUser='$password1'
								WHERE idUser=$idMhs";
						//echo $sql;
						mysqli_query($k, $sql);
						header('Location: account.php?action=masuk');
					}else{
						header('Location: pertama.php');
					}
				}else{
					header('Location: pertama.php');
				}
			}else{
				header('Location: pertama.php');
			}
		}else{
			header('Location: pertama.php');
		}
	}else{
		header('Location: pertama.php');
	}
?>