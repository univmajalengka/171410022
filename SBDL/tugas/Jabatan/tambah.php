<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		include "../koneksi.php"; 
	?>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Dashboard | admin</title>
</head>
<body>
	<nav>
		<ul class="kiri">
			<li><a href="../home.php">Menu</a></li>
		</ul>
	</nav>
	<div class="sidebar">
		<ul>
			<li><a href="../home.php">Home</a></li>
			<li><a href="../Pangkat.php">Pangkat</a></li>
			<li><a href="../Jabatan.php">Jabatan</a></li>
			<li><a href="../Pendidikan.php">Pendidikan</a></li>
			<li><a href="../Pegawai.php">Pegawai</a></li>
			<li><a href="../Absensi.php">Absensi</a></li>
			<li><a href="../User.php">User</a></li>
			<li><a href="../logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="isimain">
			<form method="POST" enctype="multipart/form-data">
				<h1><font size="5" style="text-align: left;">Tambah Jabatan : </font></h1><br>
				<table width="430px" border="0">
					<tr>
						<td>Kode Jabatan</td>
						<td>:</td>
						<td><input type="text" placeholder="Contoh : KD22" name="kd_jabatan" maxlength="50" autocomplete required></td>
					</tr>
					<tr>
						<td>Nama Jabatan</td>
						<td>:</td>
						<td><input type="text" placeholder="Contoh : Manager" name="nama_jabatan" maxlength="50" autocomplete required></td>
					</tr>
					<tr>
						<td colspan="3" style="padding-top: 15px;text-align: center;"><input type="submit" value="Simpan" name="save"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php
		//AmbildatadariForm 

		 // susunSQL
		 // EksekusiSQL

		if (isset($_POST['save'])) {
			$kd_jabatan = $_POST['kd_jabatan'];
			$nama_jabatan = $_POST['nama_jabatan'];
			$sql = "INSERT INTO tabel_jabatan VALUES('$kd_jabatan','$nama_jabatan')";
			$link = koneksi_db();
			$res = mysqli_query($link,$sql);
		if (!$res) {
			echo "<script>alert('Data gagal disimpan');history.go(-1);</script>";
		}else{
			echo "<script>alert('Data Berhasil disimpan');history.go(-1);</script>";
		}
	}
	?>
</body>
</html>