<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_GET['NIP'];
$link = koneksi_db();
$sql = "DELETE FROM tabel_pegawai WHERE NIP='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data Pegawai dengan ID <?=$id?> berhasil dihapus");
		window.location.href="../Pegawai.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal dihapus");
		window.location.href="../Pegawai.php";
	</script>
	<?php
}
?>