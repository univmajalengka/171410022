<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_POST['kd_pangkat'];
$nama = $_POST['nama_pangkat'];
$link = koneksi_db();
$sql = "UPDATE tabel_pangkat SET kd_pangkat='$id', nama_pangkat='$nama' WHERE kd_pangkat='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data Pangkat dengan ID <?=$id?> berhasil di update");
		window.location.href="../Pangkat.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal diupdate");
		window.location.href="../Pangkat.php";
	</script>
	<?php
}
?>