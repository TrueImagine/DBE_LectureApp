<?php
	session_start();
	require_once("../includes/koneksi.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Mahasiswa"){
	$sql = "SELECT kelas.idKelas, kelas.namaKelas, user.namaUser FROM kelas 
			INNER JOIN user ON kelas.idDosen = user.idUser
			INNER JOIN kelasdtl ON kelas.idKelas = kelasdtl.idKelas
			WHERE kelasdtl.idMhs = $_SESSION[user]";
	$a = mysqli_query($k,$sql);
	
	include("../includes/head_mahasiswa.php");
	include("../includes/side_mahasiswa.php");	
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Kelas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
					
					<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
										<tr>
                                            <th>Nama Kelas</th>
                                            <th>Nama Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
										while($b = mysqli_fetch_assoc($a)){
									?>
                                        <tr>
											<td>
												<a href ="kelas_mhs_detail.php?idKelas=<?php echo $b['idKelas'] ?>"> <?php echo $b['namaKelas'] ?> </a>
											</td>
											<td><?php echo $b['namaUser'] ?></td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div> <!--/.col-lg-6 -->
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
