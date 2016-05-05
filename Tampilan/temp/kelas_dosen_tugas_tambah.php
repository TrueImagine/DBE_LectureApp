<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
	
	$id = $_POST['idkelas'];
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah Tugas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<?php 
					include('../includes/dosen_dtlmenu.php'); 
				?>
				<div class="row">
					<div class="col-lg-6">
					
					<!--Tambah Tugas-->
						<form action="kelas_dosen_tugas_tambah_proses.php" method="POST" enctype="multipart/form-data">
							<label>Nama Tugas : </label>
							<input class="form-control" type="text" name="nama" />
							<br/>
							<label>Deskripsi : </label>
							<textarea class="form-control" name="deskripsiTugas" rows="3"></textarea>
							<br/>
							<label> Batas Waktu : </label>
							<input class="form-control" type="date" name="tglMulaiTugas"  />
							<br/>
							<label> s/d </label>
							<input class="form-control" type="date" name="tglSelesaiTugas"  />
							<br/>
							<label>Attachment : </label>
							<input type="file" name="tugas" />
							<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
							<input class="btn btn-default" type="submit" name="tambahTugas" value="Tambah" />
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
