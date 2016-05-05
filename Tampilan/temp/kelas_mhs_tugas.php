<?php
	session_start();
	require_once("../includes/koneksi.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");	
	
	$idKelas = $_GET['idKelas'];
	
	//query materi
	$sql="SELECT * FROM tugas WHERE idKelas = $idKelas";
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
				<?php include('../includes/mhs_dtlmenu.php'); ?>
				<span id="pesan"></span>
				<div class="row">
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<td>Nama Tugas</td>
										<td>Upload</td>
										<td>Nilai</td>
									</tr>
								</thead>
								<tbody>
							<?php
								WHILE($tugas=mysqli_fetch_assoc($hasil)){
							 
								$sql2 = "SELECT idHasiltgs, nilai FROM hasiltgs WHERE idKelas = '$idKelas' AND idUser = '$_SESSION[user]'";
								$hasil2 = mysqli_query($k,$sql2);
								$c = mysqli_fetch_assoc($hasil2);
							?>
							<tr>
								<td><a href="kelas_mhs_tugas_detail.php?idKelas=<?php echo $idKelas;?>&idtugas=<?php echo $tugas['idTugas'];?>&idhasil=<?php echo $c['idHasiltgs'];?>"><?php echo $tugas['namaTugas']?></a></td>
								<td>
								<?php 
								if(mysqli_num_rows($hasil2) == 0)
								{?>
									<form action="kelas_mhs_tugas_upload_proses.php" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
										<input type="hidden" name="idKelas" value="<?php echo $id; ?>"/>
										<input type="hidden" name="idhasil" value="<?php echo $c['idHasiltgs']; ?>"/>
										
										<input type="file" name="tugas"/>
										<div id="uploadbar" class="progress progress-striped active">
											<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
												<span class="sr-only">0% Complete</span>
											</div>
										</div>
										<input type="submit" name="upload" value="Upload">	
									</form>
								<?php
								}else
								{
									$sql3 = "SELECT fileHasiltgs FROM hasiltgs WHERE idHasiltgs = $c[idHasiltgs]";
									$hasil3 = mysqli_query($k,$sql3);
									$d = mysqli_fetch_assoc($hasil3);
									$namafile = explode("/",$d['fileHasiltgs']);
									echo end($namafile);
								}?>
								</td>
								
								<td>
								Nilai : <?php echo $c['nilai'] ?> 	
								</td>
							</tr>
							<?php
								}
							?>
							</table>
						</div>
					</div>
				
				</div>
				<!-- /.panel-default -->
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