<!DOCTYPE html>
<?php
	session_start();
	//print_r($_SESSION);
	require_once("../includes/koneksi.php");
	$idMhs=$_SESSION['first'];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>LectureApps - First Login</title>
	<!--datepicker-->
	<link rel="stylesheet" type="text/css" media="all" href="../js/datepick/jsDatePick_ltr.min.css" />

	<script type="text/javascript" src="../js/datepick/jsDatePick.min.1.3.js"></script>

	<script type="text/javascript">
		window.onload = function(){
			new JsDatePick({
				useMode:2,
				target:"inputField",
				dateFormat:"%Y-%m-%d",
				limitToToday:true
			});
		};
	</script>
	<!--datepicker-->
	<link rel="stylesheet" type="text/css" media="all" href="../js/datepick/jsDatePick_ltr.min.css" />
	
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php
	if($_SESSION['first'] == null){
		header('Location: account.php?action=masuk');
	}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
							<center>Login Pertama</center>
						</h3>
                    </div>
                    <div class="panel-body">
						<span id="pesan"></span> 			
                        <form id="pertamaform" action="pertama_proses.php" method="post" role="form">
                            <fieldset>							
								<div class="form-group">
									<label>Nama</label>
                                    <input class="form-control" type="text" name="namaUser" />									
                                </div>
								<div class="form-group">
									<label>Tanggal Lahir</label></br>
                                    <input class="form-control" placeholder="Tanggal" name="tanggallahir" type="text" id="inputField" value="" readonly>
								</div> 
                                <div class="form-group">
									<label>Password</label></br>
                                    <input class="form-control" type="password" name="password1" />									
								</div>
                                <div class="form-group">
									<label>Re-Type Password</label></br>
                                    <input class="form-control" type="password" name="password2" />									
								</div> 
								<input type="hidden" name="idMhs" value="<?php echo $idMhs ?>">
                                <input type="submit" class="btn btn-outline btn-primary" name="simpan" value="SIMPAN" />	
								<button type="button" class="btn btn-default" onclick="window.location.href='account.php'">Cancel</button>
							</fieldset>
                        </form>
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
	
	<script src="../js/jquery.form.js"></script>
	<script src="../js/loginscript.js"></script>

</body>

</html>
