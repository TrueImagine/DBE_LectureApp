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
						if($action=="masuk"){
							echo "Silahkan Masuk";
						}
						else if($action=="register"){
							echo "Register Account";
						}
						else if($action=="lupa"){
							echo "Forgot Password";
						}
						?>
						</h3>
                    </div>
                    <div class="panel-body">
						<span id="pesan"></span> 
						<?php 
						if($action=="masuk"){ //form register
						?>						
                        <form id="loginform" action="register_proses.php?action=masuk" method="post" role="form">
                            <fieldset>							
								<div class="form-group">
									<label>E-mail</label>
                                    <input class="form-control" type="email" name="username" required title="Username required" placeholder="Email">									
                                </div>
                                <div class="form-group">
									<label>Password</label></br>
                                    <input class="form-control" type="password" name="password" required title="Password required" placeholder="Password">									
								</div>                            
                                <input type="submit" class="btn btn-outline btn-primary" name="submit" value="Log In" />								
								
								<a href="account.php?action=register" title="Daftar" style="margin-left:5%;"><u>Register</u></a>
								<a href="account.php?action=lupa" title="Lupa Password" style="margin-left:5%;"><u>Forgot Your Password?</u></a>
							</fieldset>
                        </form>
						
						<?php 
						}
						else if($action=="register"){ //form register
						?>						
                        <form id="registerform" action="register_proses.php?action=register" method="post" role="form">
                            <fieldset>							
								<div class="form-group">
									<label>Nama</label>
                                    <input class="form-control" placeholder="Nama" name="nama" type="text" autofocus>
									<h1 style="font-size:12px; color:grey;">*Nama akan menjadi display name</h1>
                                </div>
                                <div class="form-group">
									<label>E-mail</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
									<h1 style="font-size:12px; color:grey;">*E-mail akan menjadi username login</h1>
                                </div>
                                <div class="form-group">
									<label>Tanggal Lahir</label></br>
                                    <input class="form-control" placeholder="Tanggal" name="tanggallahir" type="text" id="inputField" value="" readonly>
									<h1 style="font-size:12px; color:grey;">*Tanggal lahir akan menjadi Password login</h1>
								</div>                                
								<div class="form-group">
									<label>Kode Captcha</label> <img src="../includes/captcha.php" /></br>
									<input class="form-control" name="captcha" type="text" maxlength="6" />
									<h1 style="font-size:12px; color:grey;">*Kode Captcha harus diisi</h1>
								</div>
                                <input type="submit" class="btn btn-outline btn-primary" name="submit" value="Submit" />								
								<a href="account.php?action=masuk" title="Daftar" style="margin-left:5%;"><u>Have an account? Log In</u></a>
                            </fieldset>
                        </form>
						<?php
						}else if($action=="lupa"){ //form lupa password
						?>
						<form id="lupaform" action="register_proses.php?action=lupa" method="post" role="form">
                            <fieldset>							
                                <div class="form-group">
									<label>E-mail</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
									<label>Tanggal Lahir</label></br>
                                    <input class="form-control" placeholder="Tanggal" name="tanggallahir" type="text" id="inputField" value="" readonly>
								</div>  
								<div class="form-group">
									<label>Kode Captcha</label> <img src="../includes/captcha.php" /></br>
									<input class="form-control" name="captcha" type="text" maxlength="6" />
									<h1 style="font-size:12px; color:grey;">*Kode Captcha harus diisi</h1>
								</div>								
                                <input type="submit" class="btn btn-outline btn-primary" name="submit" value="Submit" />
								<a href="account.php?action=masuk" title="Daftar" style="margin-left:5%;"><u>Have an account? Log in</u></a>
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
	
	<script src="../js/jquery.form.js"></script>
	<script src="../js/loginscript.js"></script>

</body>

</html>
