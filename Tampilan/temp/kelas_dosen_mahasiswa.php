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
	
	$sql2="SELECT 
				a.*,b.`idUser`,b.`namaUser`,b.`emailUser`
			FROM 
				kelasdtl a
				LEFT JOIN USER b
				ON b.`idUser`=a.`idMhs`
			WHERE
				idKelas=$id";
	$hasil2=mysqli_query($k, $sql2);
		
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
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
<?php
	$i=1;
	while ($mhs = mysqli_fetch_assoc($hasil2)){
?>	
									<tr>
										<td><?php echo $mhs['namaUser'] ?></td>
										<td><?php echo $mhs['emailUser'] ?></td>
										
										<td><a class="dellink" href="kelas_dosen_mahasiswa_hapus.php?idMhs=<?php echo $mhs['idUser'] ?>&idkelas=<?php echo $id; ?>">Hapus</a></td>
										
									</tr>
<?php
	}
?>
								</tbody>
							</table>
						</div>
						<a href="kelas_dosen_mahasiswa_tambah.php?idkelas=<?php echo $id; ?>">+ Tambah Mahasiswa</a>
						
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