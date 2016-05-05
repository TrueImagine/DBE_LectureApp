<?php
//tugas_download.php
require_once("../../includes/koneksi.php");
if(isset($_GET['idhasiltgs']) && $_GET['idhasiltgs'] == true){
	$id = $_GET['idhasiltgs'];
	
	$sql="SELECT * FROM hasiltgs where idHasilTgs=$id";
	$hasil=mysqli_query($k, $sql);
	$hasiltgs=mysqli_fetch_assoc($hasil);
	$source = $hasiltgs['fileHasiltgs'];
	
	
	if (file_exists($source)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header("Content-Disposition: attachment; filename=\"".basename($source)."\"");
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