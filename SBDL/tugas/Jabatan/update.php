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
		</ul>
	</div>
	<div class="main">
		<div class="isimain">
			<?php
			$id = $_GET['kd_jabatan'];
			$link = koneksi_db();
			$sql = "SELECT * FROM tabel_jabatan WHERE kd_jabatan='$id'";
			$res = mysqli_query($link,$sql);

			if (mysqli_num_rows($res)==1) {
				$data = mysqli_fetch_array($res);
			?>
			<form action="proses_update.php" method="POST">
				<h1><font size="5">Edit Jabatan : </font></h1><br>
				<table width="430px">
					<tr>
						<td>Kode Jabatan</td><td>:</td>
						<td>
							<input type="text" name="kd_jabatan" value="<?=$data['kd_jabatan'];?>" required>
						</td>
					</tr>
					<tr>
						<td>Nama Jabatan</td><td>:</td>
						<td>
							<input type="text" name="nama_jabatan" value="<?=$data['nama_jabatan'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
					<tr>
						<td colspan="3" style="padding-top: 15px;text-align: center;"><input type="submit" value="Simpan" name="save"></td>
					</tr>
				</table>
			</form>
			<?php } ?>
		</div>
	</div>
</body>
</html>