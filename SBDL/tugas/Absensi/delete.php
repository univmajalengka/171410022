<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_GET['kd_absensi'];
$link = koneksi_db();
$sql = "DELETE FROM tabel_absensi WHERE kd_absensi='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data Absensi dengan ID <?=$id?> berhasil dihapus");
		window.location.href="../Absensi.php";
	</script>
	<?php
	echo "<script>alert('Data Absensi dengan ID <?=$id?> berhasil dihapus');history.go(-1);</script>";
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal dihapus");
		window.location.href="../Absensi.php";
	</script>
	<?php
}
?>