<?php
	session_start();
	require_once("../includes/koneksi.php");
	if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");
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
							<form id="ubahprofil" action="ubah_pass_proses.php" method="POST">
								<div class="form-group">
									<label>Password Lama</label>
									<input class="form-control" type="password" name="passwordLama" value="" />
								</div>
								<div class="form-group">
									<label>Password Baru</label>
									<input class="form-control" type="password" name="password1" value="" />
								</div>
								<div class="form-group">
									<label>Re-Type Password Baru</label>
									<input class="form-control" type="password" name="password2" value="" />
								</div>
								<input type="hidden" id="ubahp" value="umhs">
								<input class="btn btn-default" type="submit" name="ubahPassword" value="SIMPAN" />
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