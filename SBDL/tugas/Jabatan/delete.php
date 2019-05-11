<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_GET['kd_jabatan'];
$link = koneksi_db();
$sql = "DELETE FROM tabel_jabatan WHERE kd_jabatan='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data Jabatan dengan ID <?=$id?> berhasil dihapus");
		window.location.href="../Jabatan.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal dihapus");
		window.location.href="../Jabatan.php";
	</script>
	<?php
}
?>