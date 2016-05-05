<?php
	session_start();
	require_once("../includes/koneksi.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");	
	
	$idKelas = $_GET['idKelas'];
	$idMhs= $_SESSION['user'];
	//query materi
	$sql="SELECT 
			a.*,
			b.`idHasiltgs` idHasiltgs,
			b.fileHasiltgs,
			b.nilai
		FROM
			tugas a
			LEFT JOIN hasiltgs b
			ON a.`idTugas`= b.idTugas AND b.`idUser`= $idMhs
		WHERE 
			a.idKelas=$idKelas
			";
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
							?>
							<tr>
								<td><a href="kelas_mhs_tugas_detail.php?idKelas=<?php echo $idKelas;?>&idtugas=<?php echo $tugas['idTugas'];?>"><?php echo $tugas['namaTugas']?></a></td>
								<td>
								<?php 
								if($tugas['idHasiltgs'] == NULL)
								{?>
									<form action="kelas_mhs_tugas_upload_proses.php" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
										<input type="hidden" name="idkelas" value="<?php echo $idKelas; ?>"/>
										<input type="hidden" name="idhasil" value="<?php echo $tugas['idHasiltgs']; ?>"/>
										
										<input type="file" name="tugas"/>
										<input type="submit" name="upload" value="Upload">	
									</form>
								<?php
								}else{
								?>	
									<a href="hasiltgs/hasiltgs_download.php?idhasiltgs=<?php echo $tugas['idHasiltgs']; ?>"><?php echo $tugas['fileHasiltgs'];?></a>
								<?php 
									}
								?>
								</td>
								
								<td>
								Nilai : <?php echo $tugas['nilai'] ?> 	
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