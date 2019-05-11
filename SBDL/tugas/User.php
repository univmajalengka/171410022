<?php
	session_start();
	if(!isset($_SESSION["status"])){
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include("koneksi.php"); 
?> 
</head>
<body>
	<nav>
		<ul class="kiri">
			<li><a href="home.php">Menu</a></li>
		</ul>
	</nav>
	<div class="sidebar">
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="Pangkat.php">Pangkat</a></li>
			<li><a href="Jabatan.php">Jabatan</a></li>
			<li><a href="Pendidikan.php">Pendidikan</a></li>
			<li><a href="Pegawai.php">Pegawai</a></li>
			<li><a href="Absensi.php">Absensi</a></li>
			<li><a href="User.php">User</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="isimain">
			<a href="User/tambah.php"><input type="submit" value="Tambah Data" style="margin-bottom: 10px; margin-top: 5px;"></a>
			<?php
				$link = koneksi_db(); 
				$sql = "SELECT * FROM tabel_user"; 
				$res = mysqli_query($link,$sql);
				$banyakrecord = mysqli_num_rows($res); 
				if($banyakrecord > 0){
					?>
						<table class="tb1">
							<tr>
								<td colspan="13">
									DAFTAR USER
								</td>
							</tr> 
							<tr>
								<td>Id User</td>
								<td>Username</td>
								<td>Password</td>
								<td colspan="2">Action</td>
							</tr>
							<?php
							$i=0;
							while($data=mysqli_fetch_array($res)){ 
							$i++;
							?>
							<tr>
								<td>
									<?php echo $data['id_user'];?>
								</td>
								<td>
									<?php echo $data['username'];?>
								</td>
								<td>
									<?php echo $data['password'];?>
								</td>
								<td width="70px">
									<a href="User/update.php?id_user=<?=$data["id_user"]?>"><button id="update">Update</button></a>
								</td>
								<td width="70px">
									<a href="User/delete.php?id_user=<?=$data["id_user"]?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><button id="delete">Delete</button></a>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<p>Total User : <?=$banyakrecord?></p>
					<?php
				}else{
					?>
					<script type="text/javascript">alert("Tidak ada data dalam tabel User")
					window.location.href("User.php");
					</script>
					<?php
				}
				?>
			</div>
		</div>
</body>
</html>