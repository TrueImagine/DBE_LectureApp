<?php
//materi_download.php
require_once("../../includes/koneksi.php");
if(isset($_GET['idmateri']) && $_GET['idmateri'] == true){
	$gambar = $_GET['idmateri'];
	
	$sql="SELECT * FROM materi where idMateri=$gambar";
	$hasil=mysqli_query($k, $sql);
	$materi=mysqli_fetch_assoc($hasil);
	$source = $materi['fileMateri'];
	
	if (file_exists($source)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($source));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($source));
		ob_clean();
		flush();
		readfile($source);
		exit;
	}
}