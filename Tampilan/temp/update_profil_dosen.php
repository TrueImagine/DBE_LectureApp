<?php

if(isset($_POST['upload'])){
	if(!isset($_FILES["profile"])){
		$response = 0;
		echo $response;
	}
	else{
		$foto = $_FILES['profile'];
		$sql = "SELECT allow_ext FROM klinik";
		$b = mysqli_query($k,$sql);
		$ext = mysqli_fetch_array($b);

		$a = check_file_extension($foto['name'], $ext['allow_ext']);
		if($a){
			$sql = "SELECT id FROM dokter ORDER BY id DESC LIMIT 1";
			$b = mysqli_query($k,$sql);
			$a = mysqli_fetch_array($b);
			$id = $a['id'] + 1;
			
			$sumber = $foto['tmp_name'];
			if(!file_exists('../resources/temp')){
				mkdir('../resources/temp',0777,true);
			}
			$tujuan = "../resources/temp/foto_dokter_$id.".end(explode(".",$foto['name']));
			move_uploaded_file($sumber,$tujuan);
			$response = $tujuan;
			echo $response;
		}
		else{
			echo 0;
		}
	}
}