<?php
	require_once("../includes/koneksi.php");
	//print_r($_POST);

	if(isset($_POST['namaUser']) && $_POST['namaUser'] == true){
		if(isset($_POST['password1']) && $_POST['password1'] == true){
			if(isset($_POST['password2']) && $_POST['password2'] == true){
				if($_POST['password2'] == $_POST['password1']){
					if(isset($_POST['tanggallahir']) && $_POST['tanggallahir'] == true){
						if(isset($_POST['idMhs']) && $_POST['idMhs'] == true){
							$idMhs = $_POST['idMhs'];
							$namaUser = $_POST['namaUser'];
							$tanggallahir = $_POST['tanggallahir'];
							$password1 = $_POST['password1'];
							$password2 = $_POST['password2'];
														
							$password1 = password_hash($password1, PASSWORD_BCRYPT);
							$password2 = password_hash($password2, PASSWORD_BCRYPT);
								$sql = "UPDATE user
										SET namaUser='$namaUser', passwordUser='$password1', tglLahirUser='$tanggallahir', fotoUser='../images/fulls/foto/nopic.jpg'
										WHERE idUser=$idMhs";
								//echo $sql;
								mysqli_query($k, $sql);
								echo "99";
						}else{
							echo "99";
						}
					}else{
						echo "1";
					}
				}else{
					echo "2";
				}
			}else{
				echo "1";
			}
		}else{
			echo "1";
		}
	}else{
		echo "1";
	}
?>