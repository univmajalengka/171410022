<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_GET['kd_pendidikan'];
$link = koneksi_db();
$sql = "DELETE FROM tabel_pendidikan WHERE kd_pendidikan='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data Pendidikan dengan ID <?=$id?> berhasil dihapus");
		window.location.href="../Pendidikan.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal dihapus");
		window.location.href="../Pendidikan.php";
	</script>
	<?php
}
?>