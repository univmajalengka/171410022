<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("koneksi.php"); 
?> 
</head>
<body>
	<nav>
		<ul class="kiri">
			<li><a href="home.php">Menu</a></li>
		</ul>
	</nav>
	<div class="sidebar">
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="Pangkat.php">Pangkat</a></li>
			<li><a href="Jabatan.php">Jabatan</a></li>
			<li><a href="Pendidikan.php">Pendidikan</a></li>
			<li><a href="Pegawai.php">Pegawai</a></li>
			<li><a href="Absensi.php">Absensi</a></li>
			<li><a href="User.php">User</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="isimain">
			<a href="Absensi/tambah.php"><input type="submit" value="Tambah Data" style="margin-bottom: 10px; margin-top: 5px;"></a>
			<br>
			<?php
				$link = koneksi_db(); 

				$sql = "SELECT tabel_absensi.kd_absensi, tabel_pegawai.NIP, tabel_absensi.tanggal_absensi, tabel_absensi.jam_masuk, tabel_absensi.jam_keluar FROM tabel_absensi JOIN tabel_pegawai ON tabel_absensi.NIP = tabel_pegawai.NIP  ORDER BY tabel_absensi.kd_absensi DESC";
				$res = mysqli_query($link,$sql);
				$banyakrecord = mysqli_num_rows($res); 
				if($banyakrecord > 0){ 
				?>
						<table class="tb1">
							<tr>
								<td colspan="13">
									DAFTAR ABSENSI
								</td>
							</tr> 
							<tr>
								<td>
									Kode Absensi
								</td>
								<td>
									NIP
								</td>
								<td>
									Tanggal Absensi
								</td>
								<td>
									Jam Masuk
								</td>
								<td>
									Jam Keluar
								</td>
								<td colspan="3">Action</td>
							</tr>
							<?php
							$i=0;
							while($data=mysqli_fetch_array($res)){ 
							$i++;
							?>
							<td>
									<?php echo $data['kd_absensi'];?>
								</td>
								<td>
									<?php echo $data['NIP'];?>
								</td>
								<td>
									<?php echo $data['tanggal_absensi'];?>
								</td>
								<td>
									<?php echo $data['jam_masuk'];?>
								</td>
								<td>
									<?php echo $data['jam_keluar'];?>
								</td>
								<td width="70px">
									<a href="Absensi/detail.php?kd_absensi=<?=$data['kd_absensi']?>"><button id="det">Detail</button></a>
								</td>
								<td width="100px">
									<a href="Absensi/delete.php?kd_absensi=<?=$data["kd_absensi"]?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><button id="delete">Delete</button></a>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<p>Total Absensi : <?=$banyakrecord?></p>
					<?php
				}else{
					?>
					<script type="text/javascript">alert("Tidak ada data dalam tabel Absensi")
					window.location.href("Absensi.php");
					</script>
					Data not Found!!!
					<?php
				}
				?>
		</div>
	</div>
</body>
</html>