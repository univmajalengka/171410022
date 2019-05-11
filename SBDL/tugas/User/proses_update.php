<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<?php
include '../koneksi.php';
$id = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$MD5 = MD5($password);
$link = koneksi_db();
$sql = "UPDATE tabel_user SET id_user='$id', username='$username',password='$MD5' WHERE id_user='$id'";
$res = mysqli_query($link,$sql);
if ($res) {
	?>
	<script type="text/javascript">
		alert("Data user dengan ID <?=$id?> berhasil di update");
		window.location.href="../User.php";
	</script>
	<?php
} else{
	?>
	<script type="text/javascript">
		alert("Data gagal diupdate");
		window.location.href="../User.php";
	</script>
	<?php
}
?>