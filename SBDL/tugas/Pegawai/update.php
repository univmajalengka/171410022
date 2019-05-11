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
			$id = $_GET['NIP'];
			$link = koneksi_db();
			$sql = "SELECT * FROM tabel_pegawai WHERE NIP='$id'";
			$res = mysqli_query($link,$sql);

			if (mysqli_num_rows($res)==1) {
				$data = mysqli_fetch_array($res);
			?>
			<form action="proses_update.php" method="POST">
				<h1><font size="5">Edit Pangkat : </font></h1><br>
				<table width="430px">
					<tr>
						<td>NIP/td><td>:</td>
						<td>
							<input type="text" name="NIP" value="<?=$data['NIP'];?>" required>
						</td>
					</tr>
					<tr>
						<td>Nama Pegawai</td><td>:</td>
						<td>
							<input type="text" name="nama_pegawai" value="<?=$data['nama_pegawai'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Jenis Kelamin</td><td>:</td>
						<td>
							<input type=radio style="margin-right: 20px; margin-top: 20px;margin-bottom: 20px;" name="jk_pegawai" value="Laki-Laki" <?php if($data['jk_pegawai']=="Laki-Laki") echo"checked";?>>Laki-Laki
							<input type=radio style="margin-left: 20px;margin-right: 20px;" name="jk_pegawai" value="Perempuan" <?php if($data['jk_pegawai']=="Perempuan") echo"checked";?>>Perempuan
						</td>
					</tr>
						<tr>
						<td>Tanggal Lahir</td><td>:</td>
						<td>
							<input type="date" name="tgl_lhr" value="<?=$data['tgl_lhr'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Tempat Lahir</td><td>:</td>
						<td>
							<input type="text" name="Tmpt_lhr" value="<?=$data['Tmpt_lhr'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Golongan Darah</td><td>:</td>
						<td>
							<input type="text" name="gol_darah" value="<?=$data['gol_darah'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Agama</td><td>:</td>
						<td>
							<input type="text" name="agama" value="<?=$data['agama'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Kode Pangkat</td><td>:</td>
						<td>
							<input type="text" name="kd_pangkat" value="<?=$data['kd_pangkat'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Kode Jabatan</td><td>:</td>
						<td>
							<input type="text" name="kd_jabatan" value="<?=$data['kd_jabatan'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Kode Pendidikan</td><td>:</td>
						<td>
							<input type="text" name="kd_pendidikan" value="<?=$data['kd_pendidikan'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>RT / RW</td><td>:</td>
						<td>
							<input type="text" name="Rt_rw" value="<?=$data['Rt_Rw'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Nomor Telepon</td><td>:</td>
						<td>
							<input type="text" name="no_tlp" value="<?=$data['no_tlp'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Desa</td><td>:</td>
						<td>
							<input type="text" name="desa" value="<?=$data['desa'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Kecamatan</td><td>:</td>
						<td>
							<input type="text" name="kec" value="<?=$data['kec'];?>" maxlength="50" autocomplete required>
						</td>
					</tr>
						<tr>
						<td>Kabupaten</td><td>:</td>
						<td>
							<input type="text" name="kab" value="<?=$data['kab'];?>" maxlength="50" autocomplete required>
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