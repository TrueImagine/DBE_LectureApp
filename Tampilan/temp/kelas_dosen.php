<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	include("../includes/head_dosen.php");
	include("../includes/side_dosen.php");

	$sql="SELECT * FROM user WHERE idUser = $_SESSION[user]";
	$hasil2= mysqli_query($k, $sql);
	$nama = mysqli_fetch_assoc($hasil2);
	
	//echo "SELECT * FROM kelas WHERE idDosen=$_SESSION[user]";
	
	$query = "SELECT * FROM kelas WHERE idDosen=$_SESSION[user]";
	$hasil = mysqli_query($k, $query);
	
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Kelas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="panel panel-default">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Kelas</th>
									<th>Jumlah Murid</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
<?php
	$i=1;
	while ($b = mysqli_fetch_assoc($hasil)){
		$query2="SELECT * FROM kelasDtl WHERE idKelas=$b[idKelas]";
		$hasil2= mysqli_query($k, $query2);
		$jumlah= mysqli_num_rows($hasil2);
?>	
		<tr>
			<td>
				<a href="kelas_dosen_detail.php?idkelas=<?php echo $b['idKelas']?>"><?php echo $b['namaKelas']; ?></a>
			</td>
			<td> 
				<?php echo $jumlah; ?>
			</td>
			<td>
				<?php
					if($b['statusKelas']==0){
						echo "Tidak Aktif";
					}else{
						echo "Aktif";
					}
				?>
				
			</td>
			<td>
				<?php 
					if($b['statusKelas']==1){
				?>
						<form action='kelas_nonaktif.php?idKelas=<?php echo $b['idKelas'] ?>' method='POST'>
							<input type="submit" name="nonaktifkanKelas" value="Tidak Aktif" />
						</form>
				<?php
					}else{
				?>
						<form action='kelas_aktif.php?idKelas=<?php echo $b['idKelas'] ?>' method='POST'>
							<input type="submit" name="aktifkanKelas" value="Aktif" />
						</form>
				<?php
					}
				?>
			</td>
		</tr>
<?php
		$i++;
	}
?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-default -->
				<a href='kelas_tambah.php?idDosen=<?php echo $_SESSION['user']; ?>'>+Tambah Kelas</a>
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