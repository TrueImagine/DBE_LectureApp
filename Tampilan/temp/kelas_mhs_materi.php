<?php
	session_start();
	require_once("../includes/koneksi.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");	

	$id = $_GET['idKelas'];
	
	//query materi
	$sql="SELECT * FROM materi WHERE idKelas=$id";
	$hasil=mysqli_query($k, $sql);
	
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
				<div class="col-lg-12">
                        <h1 class="page-header">List Materi</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                        
					<?php include('../includes/mhs_dtlmenu.php')?>
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
									
								</form></td>
							</tr>
							<?php
								}
							?>
								</tbody>
							</table>
					
					</div>
                </div>
					<!-- Download ALL -->
					<form action="materi/materi_download_all.php" method="POST">
						<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
						<input type="submit" name="downloadall" class="btn btn-default" value="Save All as ZIP" />
					</form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
	include("../includes/bottom.php");
}
else{
	header("Location:../index.php");
}
?>