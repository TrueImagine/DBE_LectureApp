<?php
session_start();
	require_once("../includes/koneksi.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");
	
	$idKelas = $_GET['idKelas'];
	$idtugas = $_GET['idtugas'];
	//query materi
	$sql="SELECT * FROM tugas WHERE idKelas = $idKelas and idTugas=$idtugas";
	//echo $sql;
	$hasil=mysqli_query($k, $sql);
	$tugas=mysqli_fetch_assoc($hasil);
	
	$sql2="SELECT 
				hasiltgs.*,
				user.namaUser, 
				user.idUser
			FROM 
				hasiltgs
				LEFT JOIN user
				ON hasiltgs.idUser=user.idUser 
			WHERE 
				hasiltgs.idKelas = $idKelas
				AND hasiltgs.idTugas = $idtugas
				AND hasiltgs.idUser = $_SESSION[user]"; 
				
	$hasil2=mysqli_query($k, $sql2);
	
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $tugas['namaTugas'] ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<?php include('../includes/mhs_dtlmenu.php'); ?>
				<span id="pesan"></span>
				
				Deskripsi :
				<?php echo $tugas['deskripsiTugas']?>
				<br/><br/>
				Jenis File : <!--! jenis ext -->
				<?php echo $tugas['extTugas']; ?>
				<br/><br/>
				Batas Waktu :
				<?php echo "<u>".$tugas['tglMulaiTugas']."</u>" ?> s/d <?php echo "<u>".$tugas['tglSelesaiTugas']."</u>" ?>
				<br/><br/>
				Attachment :
				<a href="tugas/tugas_download.php?idtugas=<?php echo $tugas['idTugas']; ?>"><?php echo $tugas['fileTugas']; ?></a>
				<form action="kelas_mhs_tugas_upload_proses.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="idtugas" value="<?php echo $idtugas; ?>"/>
					<input type="hidden" name="idkelas" value="<?php echo $idKelas; ?>"/>
					
					<input type="file" name="tugas"/>
					<input type="submit" name="upload" value="Upload">	
				</form>
				
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<tbody>
							<?php
								WHILE($kumpul=mysqli_fetch_assoc($hasil2)){
							?>
							<tr>
								<td><?php echo $kumpul['namaUser'] ?></td>
								<td>
									<a href="hasiltgs/hasiltgs_download.php?idhasiltgs=<?php echo $kumpul['idHasiltgs']; ?>"><?php echo $kumpul['fileHasiltgs']; ?></a></td>
								<td>Nilai : <?php echo $kumpul['nilai'] ?></td>
							</tr>
							<?php
								}
							?>
							</table>
							
						</div>
					</div>
					<!-- Download ALL 
					<form action="hasiltgs/hasiltgs_download_all.php" method="POST">
						<input type="hidden" name="$idKelas" value="<?php echo $id; ?>"/>
						<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
						<input type="submit" name="downloadall" class="btn btn-default" value="Save All as ZIP" />
					</form> -->
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
