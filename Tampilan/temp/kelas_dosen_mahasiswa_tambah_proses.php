<?php
	require_once("../includes/koneksi.php");
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		
		$idKelas=$_POST['idkelas'];
		$email=(explode(",", str_replace(" ", "", $_POST['emailMahasiswa'])));
		//print_r($email);
		
		$i=0;
		while(each($email)){
			
			$sql4="SELECT * FROM user WHERE emailUser= '$email[$i]'";
			$hasil2=mysqli_query($k, $sql4);
			
			if(mysqli_num_rows($hasil2)>0){
				$user=mysqli_fetch_assoc($hasil2);
				$idMhs = $user['idUser'];
			
				$sql3 = "INSERT INTO kelasdtl (idKelas, idMhs)
						VALUES($idKelas, $idMhs)";
				mysqli_query($k, $sql3);
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
				
				$sql3 = "INSERT INTO kelasdtl (idKelas, idMhs)
						VALUES($idKelas, $idMhs)";
				mysqli_query($k, $sql3);
			}
			$i++;
		}  
		header('Location: kelas_dosen_mahasiswa.php?idkelas='.$idKelas);
	
	
	}

?>