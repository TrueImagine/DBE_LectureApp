<?php
	session_start();
	require_once("../includes/koneksi.php");
	$action = $_GET['action'];	
	if(isset($_POST['submit'])){
		if($action=="masuk"){	//untuk login
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$sql = "SELECT * FROM user WHERE emailUser = '$user'";
			$hasil = mysqli_query($k, $sql);
			
			$data = mysqli_fetch_array($hasil);
			if($data['namaUser']!=NULL){
				if(mysqli_num_rows($hasil)){	
					if(password_verify($pass, $data['passwordUser'])){ //verifikasi
						$_SESSION['login'] = true;
						$_SESSION['user'] = $data['idUser'];
						if($data['status'] == 0){ //login sukses
							$_SESSION['role'] = "Dosen";	
							echo "9";
						}
						else{
							$_SESSION['role'] = "Mahasiswa";
							echo "8";
						}
					}
					else{ 
						echo "6";						
					}
				}else{		
					echo "6";						
				}
			}else if($data['namaUser']==NULL){
				$_SESSION['user'] = $data['idUser'];
				if($data['status'] == 1){
					$_SESSION['role'] = "Mahasiswa";
					echo "99";
				}	
			}
		}
		else if($_SESSION['captcha']==$_POST['captcha']){ //jika captcha sesuai
			$captcha = $_POST['captcha'];
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
				}else{ //sukses , input ke database
				$sql = "INSERT INTO user (namaUser, passwordUser, emailUser, tglLahirUser, fotoUser, status) VALUES ('$nama', '$encrypted_pass', '$email', '$tanggalL', '../images/fulls/foto/nopic.jpg', 0)";
				mysqli_query($k, $sql);
					echo "3";
				}
			}else{ //untuk lupa password
				$sql = "SELECT emailUser, tglLahirUser FROM user WHERE emailUser='$email' and tglLahirUser='$tanggalL'";
				$hasil = mysqli_query($k, $sql);
				if(mysqli_num_rows($hasil)){ //sukses , password update
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
