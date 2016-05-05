<?php
	session_start();
	require_once('../includes/koneksi.php');
/*
	Dummy data
*/
	$_SESSION['login'] = true;
	$_SESSION['user'] = 3;
	$_SESSION['role'] = "Dosen";
/*
	Dummy data
*/
	$id = $_GET['idkelas'];
	$idtugas = $_GET['idtugas'];
	//query materi
	$sql="SELECT * FROM tugas WHERE idKelas=$id and idTugas=$idtugas";
	$hasil=mysqli_query($k, $sql);
	$tugas=mysqli_fetch_assoc($hasil);
	
	$sql2="SELECT 
				a.*,
				c.`namaUser` namaMahasiswa,
				c.`idUser` user,
				b.`idHasiltgs`,
				b.`fileHasiltgs`,
				b.`tglUploadHasiltgs`,
				b.`nilai`
			FROM
				kelasdtl a
				LEFT JOIN hasiltgs b
				ON a.`idKelas`=b.`idKelas` AND a.`idMhs`=b.`idUser` AND b.`idTugas`=$idtugas AND b.`idKelas`=$id
				LEFT JOIN USER c
				ON a.`idMhs`=c.`idUser`";
	//echo $sql2;
	$hasil2=mysqli_query($k, $sql2);
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LectureApps - Daftar Kelas</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><b>LectureApps - Portal Dosen</b></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="profil_dosen.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dosen.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="kelas_dosen.php"><i class="fa fa-bar-chart-o fa-fw"></i> Kelas</a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $tugas['namaTugas'] ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<?php include('../includes/dosen_dtlmenu.php'); ?>
				<span id="pesan"></span>
				
				Deskripsi :
				<?php echo $tugas['deskripsiTugas']?>
				<br/><br/>
				Batas Waktu :
				<?php echo "<u>".$tugas['tglMulaiTugas']."</u>" ?> s/d <?php echo "<u>".$tugas['tglSelesaiTugas']."</u>" ?>
				<br/><br/>
				Attachment :
				<a href="tugas/tugas_download.php?idtugas=<?php echo $tugas['idTugas']; ?>"><?php echo $tugas['fileTugas']; ?></a>
				<br/><br/>
				<form action="kelas_dosen_tugas_edit.php" method="POST" >
					<input type="submit" name="editTugas" class="btn btn-default" value="Edit Tugas" />
					<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
					<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
				</form>
				
					<div class="panel panel-default">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<tbody>
							<?php
								WHILE($kumpul=mysqli_fetch_assoc($hasil2)){
							?>
							<tr>
								<td><?php echo $kumpul['namaMahasiswa'] ?></td>
								<td><a href="hasiltgs/hasiltgs_download.php?idhasiltgs=<?php echo $kumpul['idHasiltgs']; ?>"><?php echo $kumpul['fileHasiltgs'] ?></a></td>
								<td>
									<form action="kelas_dosen_simpan_nilai.php" method="POST" >
										<label>Nilai :</label>
										<input type="text" name="nilaiTugas<?php echo $kumpul['user']; ?>" value="<?php echo $kumpul['nilai'] ?>" />
										<input type="hidden" name="id" value="<?php echo $id ?>" />
										<input type="hidden" name="idtugas" value="<?php echo $idtugas ?>" />
										<input type="hidden" name="idhasiltgs<?php echo $kumpul['user']; ?>" value="<?php echo $kumpul['idHasiltgs'] ?>" />									
								</td>
							</tr>
							<?php
								}
							?>
							</table>
						</div>
					</div>
										<input type="submit" name="submitNilai" value="SIMPAN NILAI" />
									</form>
					<!-- Download ALL -->
					<form action="hasiltgs/hasiltgs_download_all.php" method="POST">
						<input type="hidden" name="idkelas" value="<?php echo $id; ?>"/>
						<input type="hidden" name="idtugas" value="<?php echo $tugas['idTugas']; ?>"/>
						<input type="submit" name="downloadall" class="btn btn-default" value="Save All as ZIP" />
					</form>
				</div>
				<!-- /.panel-default -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	
	
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	<script src="../js/jquery.form.js"></script>
	<script src="../js/script.js"></script>
</body>

</html>
