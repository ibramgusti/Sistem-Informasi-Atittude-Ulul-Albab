<?php
session_start();
if (isset($_SESSION["username"])) {
    header('Location: mahasiswa/mhs.php');
    exit;
}
require 'aksi/koneksi.php';

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");

	if (mysqli_num_rows($result) > 0) { 
		$row = mysqli_fetch_assoc($result);

		$Username = $row['username'];
		$Password = $row["password"];
		$Level = $row['level'];

		$_SESSION['username'] = $Username;
		$_SESSION['level'] = $Level;

		echo $_SESSION['username'];
		// if ($password == $Password) {
		// 	header("Location: mahasiswa/mhs.php");
		// 	exit;
		// }

		$passw = password_hash($Password, PASSWORD_DEFAULT);

		if (password_verify($password, $passw) && $Level == 'mahasiswa') {
			header("Location: mahasiswa/mhs.php");
			exit;
		} elseif (password_verify($password, $passw) && $Level == 'pengajar') {
			header("Location: Pengajar/index_dosen.php");
			exit;
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="wrapper">
		<nav class="navbar">
			<a href= "index.html"><img src="image/ulul.png"></a>
		</nav>
	</div>
	<form class="box" action="" method="post">
		<h1>Login</h1>
		<input type="text" name="username" placeholder="Username" id="username">
		<input type="password" name="password" placeholder="Password" id="password">
		<input type="submit" name="login" value="Login" id="login">
	</form>
</body>
</html>
