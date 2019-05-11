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
				<h1><font size="5" style="text-align: left;">Tambah Absensi : </font></h1><br>
				<table width="430px" border="0">
					<tr>
						<td>Kode Absensi</td>
						<td>:</td>
						<td><input type="text" placeholder="Contoh : 01" name="kd_absensi" maxlength="50" autocomplete required></td>
					</tr>
					<tr>
						<td>NIP</td>
						<td>:</td>
						<td>
							<select name="NIP">
								<option>Pilih NIP</option>	
								<?php
									$link = koneksi_db();
									$res = mysqli_query($link,"SELECT * FROM tabel_pegawai ORDER BY NIP");
									while($data = mysqli_fetch_array($res)){
										echo "<option value=\"".$data['NIP']."\">".$data['NIP']."</option>";
									}
									$NIP = $data['NIP'];
									?>						
							</select>
					</tr>
					<tr>
						<td>Tanggal Absensi</td>
						<td>:</td>
						<td><input type="date" placeholder=" " name="tanggal_absensi" maxlength="50" autocomplete required></td>
					</tr>
					<tr>
						<td>Jam Masuk</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="jam_masuk" maxlength="50" autocomplete required></td>
					</tr>
					<tr>
						<td>Jam Keluar</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="jam_keluar" maxlength="50" autocomplete required></td>
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
			$kd_absensi = $_POST['kd_absensi'];
			$NIP = $_POST['NIP'];
			$tanggal_absensi = $_POST['tanggal_absensi'];
			$jam_masuk = $_POST['jam_masuk'];
			$jam_keluar = $_POST['jam_keluar'];
			$sql = "INSERT INTO tabel_absensi VALUES('$kd_absensi','$NIP','$tanggal_absensi','$jam_masuk','$jam_keluar')";
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