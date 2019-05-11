<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_POST['kd_penddidikan'];
$nama = $_POST['nama_pendidikan'];
$link = koneksi_db();
$sql = "UPDATE tabel_pendidikan SET kd_penddidikan='$id', nama_pendidikan='$nama' WHERE kd_penddidikan='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data Pendidikan dengan ID <?=$id?> berhasil di update");
		window.location.href="../Pendidikan.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal diupdate");
		window.location.href="../Pendidikan.php";
	</script>
	<?php
}
?>