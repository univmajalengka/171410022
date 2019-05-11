<?php
	session_start();

	include "koneksi.php";

	$username = $_POST['username'];
	$password = MD5($_POST['password']);
	$link = koneksi_db();
	$sql = "SELECT * FROM tabel_user WHERE username='$username' AND password='$password'";
	$login = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($login);
	if ($row>0) {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION["status"] = true;
		header('location:home.php');
	}else{
		echo "<script>alert('Username dan Password Anda Salah !!!');window.location.href = 'login.php'</script>";
	}
?>