<!DOCTYPE html>
<?php
	require_once("../includes/koneksi.php");
	$action = $_GET['action'];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LectureApps - Account</title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
						<?php 
						if($action=="register"){
							echo "Register Account";
						}
						else if($action=="lupa"){
							echo "Forgot Password";
						}
						?>
						</h3>
                    </div>
                    <div class="panel-body">
						<?php 
						if($action=="register"){
						?>
                        <form action="register_proses.php" method="post" role="form">
                            <fieldset>							
								<div class="form-group">
									<label>Nama</label>
                                    <input class="form-control" placeholder="Nama" name="nama" type="text" autofocus>
                                </div>
                                <div class="form-group">
									<label>E-mail / Username</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
									<h1 style="font-size:12px; color:grey;">*E-mail akan menjadi username login</h1>
                                </div>
                                <div class="form-group">
									<label>Tanggal Lahir</label></br>
                                    <input class="form-control" style="display:inline-block; width: 25%;" placeholder="Tanggal" name="tanggallahir" type="text" value="">
									<input class="form-control" style="display:inline-block; width: 25%;" placeholder="Bulan" name="bulanlahir" type="text" value="">
									<input class="form-control" style="display:inline-block; width: 25%;" placeholder="Tahun" name="tahunlahir" type="text" value="">
									<h1 style="font-size:12px; color:grey;">*Tanggal lahir akan menjadi Password login</h1>
                                </div>                                
                                <input type="submit" class="btn btn-outline btn-primary" name="submit" value="Submit" />
                            </fieldset>
                        </form>
						<?php
						}else if($action=="lupa"){
						?>
						<form action="register_proses.php" method="post" role="form">
                            <fieldset>							
                                <div class="form-group">
									<label>E-mail / Username</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
									<label>Tanggal Lahir</label></br>
                                    <input class="form-control" style="display:inline-block; width: 25%;" placeholder="Tanggal" name="tanggallahir" type="text" value="">
									<input class="form-control" style="display:inline-block; width: 25%;" placeholder="Bulan" name="bulanlahir" type="text" value="">
									<input class="form-control" style="display:inline-block; width: 25%;" placeholder="Tahun" name="tahunlahir" type="text" value="">
                                </div>                                
                                <input type="submit" class="btn btn-outline btn-primary" name="submit" value="Submit" />
                            </fieldset>
                        </form>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
