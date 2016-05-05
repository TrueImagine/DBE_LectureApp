<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
	
	$id = $_GET['idkelas'];
	
	//query materi
	$sql="SELECT * FROM tugas WHERE idKelas=$id ORDER BY tglUploadTugas";
	$hasil=mysqli_query($k, $sql);
	
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tugas</h1>
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
								WHILE($tugas=mysqli_fetch_assoc($hasil)){
							?>
							<tr>
								<td><a href="kelas_dosen_tugas_detail.php?idkelas=<?php echo $id;?>&idtugas=<?php echo $tugas['idTugas'];?>"><?php echo $tugas['namaTugas']?></a></td>
								<td>
									<form action="kelas_tugas_delete_proses.php" method="POST">
										<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
										<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
										<input type="submit" name="deletetugas" class="btn btn-default" value="Hapus" />
									</form>
								</td>
							</tr>
							<?php
								}
							?>
							</table>
						</div>
					</div>
					<form action="kelas_dosen_tugas_tambah.php" method="POST">
						<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
						<input type="submit" name="tambahtugas" class="btn btn-default" value="Tambah Tugas" />
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
