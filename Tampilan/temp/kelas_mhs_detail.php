<?php
	session_start();
	require_once("../includes/koneksi.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");	

	$idKelas = $_GET['idKelas'];
	$sql = "Select * FROM dtl_kelas";
	$a = mysqli_query($k,$sql);
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<?php
							$sql1 = "SELECT namaKelas,deskripsikelas,idKelas,idDosen FROM kelas WHERE idKelas = $idKelas";
							$hasil = mysqli_query($k,$sql1);
							$a = mysqli_fetch_assoc($hasil);
							
							$asd = $a['idDosen'];
							$sql2 = "SELECT namaUser FROM user WHERE idUser='$asd'";
							$hasil2 = mysqli_query($k,$sql2);
							$a2 = mysqli_fetch_assoc($hasil2);
						?>
                        <h1 class="page-header"><?php echo $a['namaKelas'] ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-6">
						<form role="form" id="detailform" action="updateform.php" method="POST">
							<?php include('../includes/mhs_dtlmenu.php')?>
						<div class="form-group">
							<label>Nama</label>
							<input class="form-control" name="namakelas" rows="3" value="<?php echo $a['namaKelas']; ?>" disabled>
						</div>
						<div class="form-group">
							<label>Nama  Dosen</label>
							<input class="form-control" name="namadosen" rows="3" value="<?php echo $a2['namaUser']; ?>" disabled>
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea class="form-control" name="deskripsikelas" rows="3" disabled><?php echo $a['deskripsikelas']; ?></textarea>
						</div>
						</form>
					</div><!-- col-lg-6  -->	
                    
                </div>
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
