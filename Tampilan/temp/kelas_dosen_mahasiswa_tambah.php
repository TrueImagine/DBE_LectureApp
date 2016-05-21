<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
	
	$id = $_GET['idkelas'];
	
	//query nama kelas
	$sql="SELECT * FROM kelas WHERE idKelas=$id";
	$hasil=mysqli_query($k, $sql) ;
	$kelas=mysqli_fetch_assoc($hasil);
		
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo "Kelas : ".$kelas['namaKelas'];?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<?php include('../includes/dosen_dtlmenu.php'); ?>
				<div class="row">
					<div class="col-lg-6">
					<fieldset>
						<legend>Cara 1: Masukkan e-mail mahasiswa</legend>
						<form role="form" id="detailform" action="kelas_dosen_mahasiswa_tambah_proses.php" method="POST">
							<div class="form-group">
								<label>Email Mahasiswa</label></br>
								<textarea class="form-control" name="emailMahasiswa" rows="3"></textarea>
								<i>* contoh(example@example.com, example2@example.com)</i>
							</div>
							<input type="hidden" name="idkelas" value="<?php echo $kelas['idKelas'] ?>"/>
							<input type="submit" class="btn btn-success" name="simpan" value="Simpan" />
						</form>
					</fieldset>
					<br />
					<fieldset>
						<legend>Cara 2: Import file excel (.xls/.xlsx) berisi e-mail mahasiswa</legend>
						<span id="pesan"></span>
						<form role="form" id="formimport" action="kelas_dosen_mahasiswa_tambah_file.php" method="POST">
						<div class="form-group">
							<label>Upload File (.xls/.xlsx)</label>
							<input type="file" name="excel" />
						</div>
						<div id="uploadbar" class="progress progress-striped active">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
								<span class="sr-only">0% Complete</span>
							</div>
						</div>
						<input type="hidden" name="idkelas" value="<?php echo $kelas['idKelas'] ?>"/>
						<input type="submit" class="btn btn-success" name="import" value="Import" />
					</fieldset>
					</div>
				</div>
				<!-- /.panel-default -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php
	include("../includes/bottom.php");
}
else{
	header("Location:../index.php");
}
?>