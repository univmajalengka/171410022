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
	</div>
	<div class="main">
		<div class="isimain">
			<form method="POST" enctype="multipart/form-data">
				<h1><font size="5" style="text-align: left;">Tambah Pegawai : </font></h1><br>
				<table width="430px" border="0">
					<tr>
						<td>NIP</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="NIP" maxlength="50" autocomplete required></td>
					</tr>
					<tr>
						<td>Nama Pegawai</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="nama_pegawai" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
						<input type="radio" name="jk_pegawai" value="Laki-Laki">Laki-Laki
						<input type="radio" name="jk_pegawai" value="Perempuan">Perempuan
						</td>
					</tr>
						<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><input type="date" placeholder=" " name="tgl_lhr" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="Tmpt_lhr" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Golongan Darah</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="gol_darah" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Agama</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="agama" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Kode Pangkat</td>
						<td>:</td>
						<td>
							<select name="kd_pangkat">
								<option>Pilih Kode Pangkat</option>	
								<?php
									$link = koneksi_db();
									$res = mysqli_query($link,"SELECT * FROM tabel_pangkat ORDER BY kd_pangkat");
									while($data = mysqli_fetch_array($res)){
										echo "<option value=\"".$data['kd_pangkat']."\">".$data['Nama_pangkat']."</option>";
									}
									$kd_pangkat = $data['kd_pangkat'];
									?>						
							</select>
						</td>
					</tr>
						<tr>
						<td>Kode Jabatan</td>
						<td>:</td>
						<td>
							<select name="kd_jabatan">
								<option>Pilih Kode Jabatan</option>	
								<?php
									$link = koneksi_db();
									$res = mysqli_query($link,"SELECT * FROM tabel_jabatan ORDER BY kd_jabatan");
									while($data = mysqli_fetch_array($res)){
										echo "<option value=\"".$data['kd_jabatan']."\">".$data['nama_jabatan']."</option>";
									}
									$kd_jabatan = $data['kd_jabatan'];
									?>						
							</select>
						</td>
					</tr>
						<tr>
						<td>Kode Pendidikan</td>
						<td>:</td>
						<td>
							<select name="kd_pendidikan">
								<option>Pilih Kode Pendidikan</option>	
								<?php
									$link = koneksi_db();
									$res = mysqli_query($link,"SELECT * FROM tabel_pendidikan ORDER BY kd_pendidikan");
									while($data = mysqli_fetch_array($res)){
										echo "<option value=\"".$data['kd_pendidikan']."\">".$data['nama_pendidikan']."</option>";
									}
									$kd_pendidikan = $data['kd_pendidikan'];
									?>						
							</select>
						</td>
					</tr>
						<tr>
						<td>RT / RW</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="Rt_rw" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Nomor Telepon</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="no_tlp" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Desa</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="desa" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Kecamatan</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="kec" maxlength="50" autocomplete required></td>
					</tr>
						<tr>
						<td>Kabupaten</td>
						<td>:</td>
						<td><input type="text" placeholder=" " name="kab" maxlength="50" autocomplete required></td>
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
			$link = koneksi_db();
			$NIP=$_POST['NIP'];
			$cek = "SELECT * FROM tabel_pegawai WHERE NIP='$NIP'";
			$query = mysqli_query($link,$cek);
			if (mysqli_num_rows($query)>0) {
				echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
			}else{
				$NIP=$_POST['NIP'];
				$jk_pegawai=$_POST['jk_pegawai'];
				$nama = $_POST['nama_pegawai'];  
				$tgl_lahir = $_POST['tgl_lahir'];
				$tanggal = date('Y-m-d',strtotime($tgl_lahir));
				$Tmpt_lhr=$_POST['Tmpt_lhr'];
				$gol_darah=$_POST['gol_darah'];
				$agama=$_POST['agama'];
				$kd_pangkat=$_POST['kd_pangkat'];
				$kd_jabatan=$_POST['kd_jabatan'];
				$kd_pendidikan=$_POST['kd_pendidikan'];
				$Rt_rw=$_POST['Rt_rw']; 
				$no_tlp=$_POST['no_tlp'];
				$desa=$_POST['desa'];
				$kec=$_POST['kec']; 
				$kab=$_POST['kab'];
			$sql = "INSERT INTO tabel_pegawai VALUES('$NIP','$nama','$jk_pegawai','$tanggal','$Tmpt_lhr','$gol_darah','$agama','$kd_pangkat','$kd_jabatan','$kd_pendidikan','$Rt_rw','$no_tlp','$desa','$kec','$kab')";
			$link = koneksi_db();
			$res = mysqli_query($link,$sql);
				if (!$res) {
					echo "<script>alert('Data gagal disimpan');history.go(-1);</script>";
				}else{
					echo "<script>alert('Data Berhasil disimpan');history.go(-1);</script>";
				}
			}
	}
	?>
</body>
</html>