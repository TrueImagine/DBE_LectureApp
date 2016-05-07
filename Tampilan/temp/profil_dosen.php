<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");

	$sql = "SELECT namaUser, emailUser, tglLahirUser, fotoUser FROM User WHERE idUser = $_SESSION[user]";	
	$a = mysqli_query($k,$sql);
	if(mysqli_num_rows($a) > 0){
		$dataUser = mysqli_fetch_assoc($a);
	}
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Profil Dosen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="col-lg-12">
                    <div class="row">
						<div class="col-lg-6">
							<span id="pesan"></span>
							<form role="form" method="POST" id="formprofil" action="update_profil_dosen.php">
								<div class="form-group">
									<img src="<?php if($dataUser['fotoUser'] == ""){ 
														echo "../images/fulls/foto/nopic.jpg"; 
													}else{ 
														echo $dataUser['fotoUser'];
													}
												?>" id="image" >
									<input type="file" name="profile" />
									<div id="uploadbar" class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            <span class="sr-only">0% Complete</span>
                                        </div>
                                    </div>
									<input type="hidden" name="hidpath" id="hidpath" value="<?php echo $dataUser['fotoUser']; ?>" />
									<input type="submit" class="btn btn-default" name="upload" value="Upload" />
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" value="<?php echo $dataUser['namaUser']; ?>"/>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dataUser['tglLahirUser']; ?>"/>
								</div>
								<div class="form-group">
									<label>E-mail / Username</label>
									<input type="email" name="email" class="form-control" value="<?php echo $dataUser['emailUser']; ?>"/>
								</div>
								<input type="submit" class="btn btn-default" name = "ubahpass" value="Ubah Password" />
								<input type="submit" class="btn btn-default" name = "simpan" value="Simpan" />
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
