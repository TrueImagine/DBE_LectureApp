<?php
session_start();
/*
	Dummy data
*/
	
/*
	Dummy data
*/
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");
	
	require_once("../includes/koneksi.php");
	$sql = "SELECT tglPesan, isiPesan FROM pesan a
			JOIN kelas b ON b.idKelas = a.idKelas
			WHERE b.idDosen = $_SESSION[user] AND a.idJenispsn = 0
			ORDER BY tglPesan DESC LIMIT 10";
	$tabel = mysqli_query($k, $sql);
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Portal Dosen</h1>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <?php
								while($row = mysqli_fetch_assoc($tabel)){
							?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> <?php echo $row['isiPesan']; ?>
                                    <span class="pull-right text-muted small"><em><?php echo $row['tglPesan']; ?></em>
                                    </span>
                                </a>
							<?php
								}
							?>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.row -->
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