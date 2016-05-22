<?php
	require_once("../includes/koneksi.php");
	$sql ="SELECT * FROM user WHERE idUser=$_SESSION[user]";
	$hasil2 = mysqli_query($k, $sql);
	$nama = mysqli_fetch_assoc($hasil2);
	
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LectureApps - Portal Pelajar</title>

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <a class="navbar-brand" href="index.html"><b>LectureApps - Portal Pelajar</b></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<?php echo "Selamat siang, ".$nama['namaUser'];?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
					<ul class="dropdown-menu dropdown-tasks">
                        <?php 
						
						$sql2 = "SELECT * FROM kelasdtl WHERE idMhs=$_SESSION[user]";
						$hasil = mysqli_query($k,$sql2);
						$b = mysqli_fetch_assoc($hasil);
						while($b = mysqli_fetch_assoc($hasil)){
		
						$sql3 = "SELECT * FROM tugas WHERE idKelas=$b[idKelas]";
						$hasil3 = mysqli_query($k,$sql3);
						while($c = mysqli_fetch_assoc($hasil3)){ ?>
						<li>
                            <a href="#">
                                <div>
									<?php
										$time = strtotime($c['tglSelesaiTugas']);
										$selesai = date("Y-m-d",$time);
										$sisa = date("Y-m-d");
									?>
                                    <p>
                                        <strong><?php echo $c['namaTugas'];?></strong>
                                        <span class="pull-right text-muted"><?php echo $selesai.$sisa; ?></span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
						<?php }
						} ?>
                        
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
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profil_mahasiswa.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
        </ul>      