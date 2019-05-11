<?php
	session_start();
	if(!isset($_SESSION["status"])){
		echo'<script type="text/javascript">
			alert("Silahkan Login Terlebih Dahulu");
			window.location.href="../login.php";
		</script>';
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
			<li><a href="../logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="isimain">
			<?php
			$id = $_GET['NIP'];
			$link = koneksi_db();
			$sql = "SELECT tabel_absensi.kd_absensi, tabel_pegawai.NIP, tabel_absensi.tanggal_absensi, tabel_absensi.jam_masuk, tabel_absensi.jam_keluar, tabel_pegawai.nama_pegawai, tabel_pegawai.jk_pegawai, tabel_pegawai.tgl_lhr, tabel_pegawai.Tmpt_lhr, tabel_pegawai.gol_darah, tabel_pegawai.Agama, tabel_pegawai.kd_pangkat, tabel_pegawai.kd_jabatan, tabel_pegawai.kd_pendidikan, tabel_pegawai.Rt_Rw, tabel_pegawai.no_tlp, tabel_pegawai.desa, tabel_pegawai.kec, tabel_pegawai.kab FROM tabel_absensi JOIN tabel_pegawai ON tabel_absensi.NIP = tabel_pegawai.NIP ORDER BY tabel_pegawai.NIP"; 
			$res = mysqli_query($link,$sql);
			if (mysqli_num_rows($res)==1) {
				$data = mysqli_fetch_array($res);
			?>
				<h1><font size="5">Detail Absensi </font></h1><br>
				<table width="auto" cellpadding="10" cellspacing="5">
					<tr>
						<td>NIP</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['NIP'];?>" readonly>
						</td>
						<td></td>
						<td>Nama Pegawai</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['nama_pegawai'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['jk_pegawai'];?>" readonly>
						</td>
						<td></td>
						<td>Tanggal Lahir</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['tgl_lhr'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['Tmpt_lhr'];?>" readonly>
						</td>
						<td></td>
						<td>Golongan Darah</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['gol_darah'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Agama</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['Agama'];?>" readonly>
						</td>
						<td></td>
						<td>Kode Pangkat</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['kd_pangkat'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Kode Jabatan</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['kd_jabatan'];?>" readonly>
						</td>
						<td></td>
						<td>Kode Pendidikan</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['kd_pendidikan'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>RT / RW</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['Rt_Rw'];?>" readonly>
						</td>
						<td></td>
						<td>Nomor Telepon</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['no_tlp'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Desa</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['desa'];?>" readonly>
						</td>
						<td></td>
						<td>Kecamatan</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['kec'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Kabupaten</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['kab'];?>" readonly>
						</td>
						<td></td>
						<td>Tanggal Absensi</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['tanggal_absensi'];?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Jam Masuk</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['jam_masuk'];?>" readonly>
						</td>
						<td></td>
						<td>Jam Keluar</td><td>:</td>
						<td>
							<input type="text"  value="<?=$data['jam_keluar'];?>" readonly>
						</td>
					</tr>
					
				</table>
			</form>
			<?php } ?>
		</div>
	</div>
</body>
</html>