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
	
	$idDosen=$kelas['idDosen'];
	
	$sql2="SELECT namaUser FROM user WHERE idUser=$idDosen";
	$hasil2=mysqli_query($k, $sql2);
	$namaDosen=mysqli_fetch_assoc($hasil2);
	
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
						<form role="form" id="detailform" action="kelas_detail_ubah.php" method="POST">
							<div class="form-group">
								<label>Nama</label>
								<input class="form-control" name="namakelas" value="<?php echo $kelas['namaKelas']; ?>" />
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" name="deskripsikelas" rows="3"><?php echo $kelas['deskripsiKelas']; ?></textarea>
							</div>
							<input type="hidden" name="idkelas" value="<?php echo $kelas['idKelas'] ?>"/>
							<input type="submit" name="updatekelas" class="btn btn-default" value="Simpan" />
						</form>
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