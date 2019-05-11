<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_GET['id_user'];
$link = koneksi_db();
$sql = "DELETE FROM tabel_user WHERE id_user='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data user dengan ID <?=$id?> berhasil dihapus");
		window.location.href="../User.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal dihapus");
		window.location.href="../User.php";
	</script>
	<?php
}
?>