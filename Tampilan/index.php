<!DOCTYPE HTML>
<?php
	require_once("includes/koneksi.php");
?>
<html>
	<head>
		<title>LectureApps</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading-0 is-loading-1 is-loading-2">
		<!-- Main -->
			<div id="banner">
				<h1>ASISTEN DOSEN</h1>
			</div>
			<div id="viewer">
			<div id="badan">
				<img src="images/fulls/LOGO BIOS.jpeg" />
				<div>
					<h1>Selamat Datang di LectureApp</h1>
				</div>
				<p>
					LectureApp adalah situs nirlaba yang menyediakan fasilitas e-learning untuk semua orang.
					Daftar untuk menjadi pengajar, buat kelas Anda dan daftarkan murid-murid Anda untuk menjadi bagian dari
					pembelajaran yang modern!
				</p>
			</div>
				SILAHKAN ISI
			</div>
			<div id="main">
				<!-- Header -->
					<header id="header">
						<section class="login">
						<?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} ?>
							<div class="titulo">Login LecturerApps</div>
								<form action="temp/login_proses.php" method="post" enctype="application/x-www-form-urlencoded">
									<input type="text" name="username" required title="Username required" placeholder="Email" data-icon="U">
									<input type="password" name="password" required title="Password required" placeholder="Password" data-icon="x">
									<div class="olvido">
										<div class="col"><a href="temp/account.php?action=register" title="Daftar">Register</a></div>
										<div class="col"><a href="temp/account.php?action=lupa" title="Lupa Password">Forgot Password?</a></div>
									</div>
									<input type="submit" name="login" value="Login" />
								</form>
						</section>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
					</header>

				<!-- Thumbnail -->
					<section id="thumbnails">
						
						ISI AJA KALENDER
					</section>
					
				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; LectureApps - 2016</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>