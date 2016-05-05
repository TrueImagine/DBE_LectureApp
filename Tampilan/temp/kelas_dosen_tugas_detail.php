<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
	
	$id = $_GET['idkelas'];
	$idKelas = $_GET['idkelas'];
	$idKelastugas = $_GET['idtugas'];
	//query materi
	$sql="SELECT * FROM tugas WHERE idKelas=$idKelas and idTugas=$idKelastugas";
	$hasil=mysqli_query($k, $sql);
	$tugas=mysqli_fetch_assoc($hasil);
	
	$sql2="SELECT 
				a.*,
				c.`namaUser` namaMahasiswa,
				c.`idUser` user,
				b.`idHasiltgs`,
				b.`fileHasiltgs`,
				b.`tglUploadHasiltgs`,
				b.`nilai`
			FROM
				kelasdtl a
				LEFT JOIN hasiltgs b
				ON a.`idKelas`=b.`idKelas` AND a.`idMhs`=b.`idUser` AND b.`idTugas`=$idKelastugas AND b.`idKelas`=$idKelas
				LEFT JOIN USER c
				ON a.`idMhs`=c.`idUser`";
	//echo $sql2;
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
				<?php include('../includes/dosen_dtlmenu.php'); ?>
				<span id="pesan"></span>
				
				Deskripsi :
				<?php echo $tugas['deskripsiTugas']?>
				<br/><br/>
				Batas Waktu :
				<?php echo "<u>".$tugas['tglMulaiTugas']."</u>" ?> s/d <?php echo "<u>".$tugas['tglSelesaiTugas']."</u>" ?>
				<br/><br/>
				Attachment :
				<a href="tugas/tugas_download.php?idtugas=<?php echo $tugas['idTugas']; ?>"><?php echo $tugas['fileTugas']; ?></a>
				<br/><br/>
				<form action="kelas_dosen_tugas_edit.php" method="POST" >
					<input type="submit" name="editTugas" class="btn btn-default" value="Edit Tugas" />
					<input type="hidden" name="idkelas" value="<?php echo $idKelas; ?>"/>
					<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
				</form>
				
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<tbody>
							<?php
								WHILE($kumpul=mysqli_fetch_assoc($hasil2)){
							?>
							<tr>
								<td><?php echo $kumpul['namaMahasiswa'] ?></td>
								<td><a href="hasiltgs/hasiltgs_download.php?idhasiltgs=<?php echo $kumpul['idHasiltgs']; ?>"><?php echo $kumpul['fileHasiltgs'] ?></a></td>
								<td>
									<form action="kelas_dosen_simpan_nilai.php" method="POST" >
										<label>Nilai :</label>
										<input type="text" name="nilaiTugas<?php echo $kumpul['user']; ?>" value="<?php echo $kumpul['nilai'] ?>" />
										<input type="hidden" name="id" value="<?php echo $idKelas ?>" />
										<input type="hidden" name="idtugas" value="<?php echo $idKelastugas ?>" />
										<input type="hidden" name="idhasiltgs<?php echo $kumpul['user']; ?>" value="<?php echo $kumpul['idHasiltgs'] ?>" />									
								</td>
							</tr>
							<?php
								}
							?>
							</table>
						</div>
					</div>
										<input type="submit" name="submitNilai" value="SIMPAN NILAI" />
									</form>
					<!-- Download ALL -->
					<form action="hasiltgs/hasiltgs_download_all.php" method="POST">
						<input type="hidden" name="idkelas" value="<?php echo $idKelas; ?>"/>
						<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
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
