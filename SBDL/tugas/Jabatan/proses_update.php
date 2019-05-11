<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_POST['kd_jabatan'];
$nama = $_POST['nama_jabatan'];
$link = koneksi_db();
$sql = "UPDATE tabel_jabatan SET kd_jabatan='$id', nama_jabatan='$nama' WHERE kd_jabatan='$id'";
$res = mysqli_query($link,$sql);
	if ($res) {
	?>
	<script type="text/javascript">
		alert("Data Jabatan dengan ID <?=$id?> berhasil di update");
		window.location.href="../Jabatan.php";
	</script>
	<?php
	}else{
	?>
	<script type="text/javascript">
		alert("Data gagal diupdate");
		window.location.href="../Jabatan.php";
	</script>
	<?php
}
?>