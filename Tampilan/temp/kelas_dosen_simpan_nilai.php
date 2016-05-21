<?php
	require_once("../includes/koneksi.php");
	session_start();
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
			
			$sql = "SELECT namaTugas FROM tugas WHERE idTugas = $idtugas";
			$hasil2 = mysqli_query($k, $sql);
			$nTugas = mysqli_fetch_assoc($hasil2);
			$sql ="SELECT namaUser FROM user WHERE idUser=$_SESSION[user]";
			$hasil2 = mysqli_query($k, $sql);
			$dos = mysqli_fetch_assoc($hasil2);
			$sql = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah memberi penilaian pada tugas $nTugas[namaTugas]', 1, $id, '".date("Y-m-d")."')";
			mysqli_query($k, $sql);
			header('Location: kelas_dosen_tugas_detail.php?idkelas='.$id.'&idtugas='.$idtugas);		
		}
	}
?>