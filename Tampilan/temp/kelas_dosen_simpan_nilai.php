<?php
	require_once("../includes/koneksi.php");
	if(isset($_POST['id']) && $_POST['id'] == true){
		if(isset($_POST['idtugas']) && $_POST['idtugas'] == true){
			$id = $_POST['id'];
			$idtugas = $_POST['idtugas'];
			
			
			$sql="SELECT 
					a.*,
					b.`idHasiltgs`
				FROM
					kelasdtl a
					LEFT JOIN hasiltgs b
					ON a.`idKelas`=b.`idKelas` AND a.`idMhs`=b.`idUser` 
				WHERE
					b.`idTugas`=$idtugas
					AND b.`idKelas`=$id ";
			$hasil = mysqli_query($k, $sql);
			
			while($sudahkumpul = mysqli_fetch_assoc($hasil)){
				$nilaitugas = "nilaiTugas".$sudahkumpul['idMhs'];
				$idhasiltgs = "idhasiltgs".$sudahkumpul['idMhs'];
				
				$sql2="UPDATE hasiltgs 
						SET nilai=$_POST[$nilaitugas]
						WHERE idHasiltgs=$_POST[$idhasiltgs]";
				mysqli_query($k, $sql2);
			}
			header('Location: kelas_dosen_tugas_detail.php?idkelas='.$id.'&idtugas='.$idtugas);		
		}
	}
?>