<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
	$NIP=$_POST['NIP'];
	$nama_pegawai=$_POST['nama_pegawai'];
	$jk_pegawai=$_POST['jk_pegawai'];  
	$tgl_lahir = $_POST['tgl_lhr'];
	$tanggal = date('Y-m-d',strtotime($tgl_lahir));
	$Tmpt_lhr=$_POST['Tmpt_lhr'];
	$gol_darah=$_POST['gol_darah'];
	$kd_pangkat=$_POST['kd_pangkat'];
	$kd_jabatan=$_POST['kd_jabatan'];
	$kd_pendidikan=$_POST['kd_pendidikan'];
	$Rt_rw=$_POST['Rt_rw']; 
	$no_tlp=$_POST['no_tlp'];
	$desa=$_POST['desa'];
	$kec=$_POST['kec']; 
	$kab=$_POST['kab']; 
	$link=koneksi_db();
	$sql = "UPDATE tabel_pegawai set NIP='$NIP',nama_pegawai='$nama_pegawai',jk_pegawai='$jk_pegawai',tgl_lhr='$tanggal',Tmpt_lhr='$Tmpt_lhr',gol_darah='$gol_darah',kd_pangkat='$kd_pangkat',kd_jabatan='$kd_jabatan',kd_pendidikan='$kd_pendidikan',Rt_Rw='$Rt_rw', no_tlp='$no_tlp', desa='$desa', kec='$kec', kab='$kab' where NIP='$NIP'";
	$res = mysqli_query($link,$sql);
	if ($res) {
		echo "<script>alert('Data Berhasil diupdate');history.go(-1);</script>";
	}else{
		echo "<script>alert('Data Gagal diupdate');history.go(-1);</script>";
	}
?>