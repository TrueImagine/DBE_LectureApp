<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
	
	$id = $_GET['idkelas'];
	
	//query materi
	$sql="SELECT * FROM materi WHERE idKelas=$id";
	$hasil=mysqli_query($k, $sql);
	
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Materi</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<?php include('../includes/dosen_dtlmenu.php'); ?>
				<span id="pesan"></span>
				<div class="row">
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<tbody>
							<?php
								WHILE($materi=mysqli_fetch_assoc($hasil)){
							?>
							<tr>
								<td><a href="materi/materi_download.php?idmateri=<?php echo $materi['idMateri']; ?>"><?php echo $materi['namaMateri']; ?></a></td>
								<td>
									<form action='kelas_materi_delete_proses.php' method='POST'>
									<input type="hidden" name="idmateri" value="<?php echo $materi['idMateri']; ?>"/>
									<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
									<input type="submit" name="deletemateri" class="btn btn-default" value="Hapus" />
								</form></td>
							</tr>
							<?php
								}
							?>
							</table>
						</div>
					</div>
					
					<!-- Tambah Materi -->
					<form id="tambahmateri" action ="kelas_dosen_materi_tambah.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
						<input type="file" name="materi"/>
						<div id="uploadbar" class="progress progress-striped active">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
								<span class="sr-only">0% Complete</span>
							</div>
						</div>
						<input type="submit" name="tambahMateri" value="Tambah" />
					</form>
					
					<!-- Download ALL -->
					<form action="materi/materi_download_all.php" method="POST">
						<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
						<input type="submit" name="downloadall" class="btn btn-default" value="Save All as ZIP" />
					</form>
				
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
