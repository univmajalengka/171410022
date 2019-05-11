<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_GET['kd_pangkat'];
$link = koneksi_db();
$sql = "DELETE FROM tabel_pangkat WHERE kd_pangkat='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data kategori dengan ID <?=$id?> berhasil dihapus");
		window.location.href="../Pangkat.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal dihapus");
		window.location.href="../Pangkat.php";
	</script>
	<?php
}
?>