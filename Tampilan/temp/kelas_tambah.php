<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah Kelas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<form role="form" action="kelas_tambah_proses.php?idDosen=<?php echo $_GET['idDosen']; ?>" method="POST">
					<div class="form-group" id="namaKelas">
						<label class="control-label" for="inputError">Nama Kelas</label>
						<input type="text" name="namaKelas" class="form-control" data-container="body" data-trigger="manual" data-toggle="popover" data-placement="top" data-content="Kolom ini tidak boleh kosong!" />
					</div>
					<div class="form-group">
						<label>Deskripsi Kelas</label>
						<textarea name="deskripsiKelas" class="form-control" rows="3"></textarea>
					</div>
					<a href="kelas_dosen.php" class="btn btn-danger">Batal</a>
					<input type="submit" id="tambahButton" name="tambahKelas" value="Tambah" class="btn btn-success" disabled />
				</form>
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