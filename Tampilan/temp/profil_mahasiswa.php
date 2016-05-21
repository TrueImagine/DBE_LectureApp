<?php
	session_start();
	require_once("../includes/koneksi.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");
	$sql = "SELECT namaUser, emailUser, tglLahirUser, fotoUser FROM user WHERE idUser = $_SESSION[user]";
	$a = mysqli_query($k,$sql);
	if(mysqli_num_rows($a) > 0){
		$dataMhs = mysqli_fetch_assoc($a);
	}
?>		
		<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Profil Mahasiswa</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="col-lg-12">
                    <div class="row">
						<div class="col-lg-6">
							<span id="pesan"></span>
							<form role="form" method="POST" id="formprofil" action="update_profil_mhs.php">
								<div class="form-group">
									<img src="<?php if($dataMhs['fotoUser'] == "") echo "../images/fulls/foto/nopic.jpg"; else echo $dataMhs['fotoUser']; ?>" id="image" width="300px" height="300px" />
									<input type="file" name="profile" />
									<div id="uploadbar" class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            <span class="sr-only">0% Complete</span>
                                        </div>
                                    </div>
									<input type="hidden" name="hidpath" id="hidpath" value="<?php echo $dataMhs['fotoUser']; ?>" />
									<input type="submit" class="btn btn-default" name="upload" value="Upload" />
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" value="<?php echo $dataMhs['namaUser']; ?>"/>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dataMhs['tglLahirUser']; ?>"/>
								</div>
								<div class="form-group">
									<label>E-mail / Username</label>
									<input type="email" name="email" class="form-control" value="<?php echo $dataMhs['emailUser']; ?>"/>
								</div>
								<input type="submit" class="btn btn-default" name = "simpan" value="Simpan" />
							</form>
							<form action="mhs_ubah_pass.php" method="POST">
								<input type="submit" class="btn btn-default" name = "ubahpass" value="Ubah Password" />
							</form>
						</div>
					</div>
				</div>
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