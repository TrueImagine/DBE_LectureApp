<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
	
	$id = $_POST['idkelas'];
	$idtugas = $_POST['idtugas']; 
	//query data
	$sql="SELECT * FROM tugas WHERE idkelas=$id AND idtugas=$idtugas";
	$hasil=mysqli_query($k, $sql);
	$tugas=mysqli_fetch_assoc($hasil);
	
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Tugas</h1>
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
						<form action="kelas_dosen_tugas_edit_proses.php" method="POST" enctype="multipart/form-data">
							<label>Nama Tugas : </label>
							<input class="form-control" type="text" name="nama" value="<?php echo $tugas['namaTugas'] ?>" />
							<br/>
							<label>Deskripsi : </label>
							<textarea class="form-control" name="deskripsiTugas" rows="3"><?php echo $tugas['deskripsiTugas'] ?></textarea>
							<br/>
							<label> Batas Waktu : </label>
							<input class="form-control" type="date" name="tglMulaiTugas"  value="<?php echo $tugas['tglMulaiTugas'] ?>" />
							<br/>
							<label> s/d </label>
							<input class="form-control" type="date" name="tglSelesaiTugas" value="<?php echo $tugas['tglSelesaiTugas'] ?>" />
							<br/>
							<label>Attachment : </label>
							<input type="file" name="tugas" />
							<input type="hidden" name="idtugas" value="<?php echo $idtugas; ?>"/>
							<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
							<input class="btn btn-default" type="submit" name="editTugas" value="Simpan" />
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
