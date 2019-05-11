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
			<a href="Pegawai/tambah.php"><input type="submit" value="Tambah Data" style="margin-bottom: 10px; margin-top: 5px;"></a>
			<?php
	$link = koneksi_db(); 

	$sql = "SELECT tabel_pegawai.NIP, tabel_pegawai.nama_pegawai, tabel_pegawai.jk_pegawai, tabel_pegawai.tgl_lhr, tabel_pegawai.Tmpt_lhr, tabel_pegawai.gol_darah, tabel_pegawai.Agama, tabel_pangkat.Nama_pangkat, tabel_jabatan.nama_jabatan, tabel_pendidikan.nama_pendidikan, tabel_pegawai.Rt_rw, tabel_pegawai.no_tlp, tabel_pegawai.desa, tabel_pegawai.kec, tabel_pegawai.kab FROM tabel_pegawai JOIN tabel_pangkat ON tabel_pegawai.kd_pangkat = tabel_pangkat.kd_pangkat JOIN tabel_jabatan ON tabel_pegawai.kd_jabatan = tabel_jabatan.kd_jabatan JOIN tabel_pendidikan ON tabel_pegawai.kd_pendidikan = tabel_pendidikan.kd_pendidikan ORDER BY tabel_pegawai.NIP"; 

	$res = mysqli_query($link,$sql);

	$banyakrecord = mysqli_num_rows($res); 
	if($banyakrecord > 0){ 
	?>
						<table class="tb1">
							<tr>
								<td colspan="18">
									DAFTAR PEGAWAI
								</td>
							</tr> 
							<tr>
								<td>NIP</td><td>Nama Pegawai</td><td>Jenis Kelamin</td><td>Tanggal Lahir</td><td>Tempat Lahir</td><td>Gol Darah</td><td>Agama</td><td>Kode Pangkat</td><td>Kode Jabatan</td><td>Kode Pendidikan</td><td>Rt/Rw</td><td>Nomor Telepon</td><td>Desa</td><td>Kecamatan</td><td>Kabupaten</td>
								<td colspan="3">
									Aksi
								</td>
							</tr>
							<?php
							$i=0;
							while($data=mysqli_fetch_array($res)){ 
							$i++;
							?>
							<tr>
								<td align="center">
									<?php echo $data['NIP'];?>
								</td>
								<td>
									<?php echo $data['nama_pegawai'];?>
								</td>
								<td>
									<?php echo $data['jk_pegawai'];?>
								</td>
								<td>
									<?php echo $data['tgl_lhr'];?>
								</td>
								<td>
									<?php echo $data['Tmpt_lhr'];?>
								</td>
								<td>
									<?php echo $data['gol_darah'];?>
								</td>
								<td>
									<?php echo $data['Agama'];?>
								</td>
								<td>
									<?php echo $data['Nama_pangkat'];?>
								</td>
								<td>
									<?php echo $data['nama_jabatan'];?>
								</td>
								<td>
									<?php echo $data['nama_pendidikan'];?>
								</td>
								<td>
									<?php echo $data['Rt_rw'];?>
								</td>
								<td>
									<?php echo $data['no_tlp'];?>
								</td>
								<td>
									<?php echo $data['desa'];?>
								</td>
								<td>
									<?php echo $data['kec'];?>
								</td>
								<td>
									<?php echo $data['kab'];?>
								</td>
								<td width="70px">
									<a href="Pegawai/detail.php?NIP=<?=$data["NIP"]?>"><button id="det">Detail</button></a>
								</td>								
								<td width="70px">
									<a href="Pegawai/update.php?NIP=<?=$data["NIP"]?>"><button id="update">Update</button></a>
								</td>
								<td width="70px">
									<a href="Pegawai/delete.php?NIP=<?=$data["NIP"]?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><button id="delete">Delete</button></a>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<p>Total Pegawai : <?=$banyakrecord?></p>
					<?php
				}else{
					?>
					<script type="text/javascript">alert("Tidak ada data dalam tabel Pegawai")
					window.location.href("Pegawai.php");
					</script>
					<?php
				}
				?>
			</div>
		</div>
</body>
</html>