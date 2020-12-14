<?php
session_start();
include '../aksi/koneksi.php';
$id = @$_GET['id'];
$q_pertemuan = "SELECT * FROM pertemuan WHERE id_pertemuan = $id";
$res_pertemuan = mysqli_query($koneksi, $q_pertemuan);
$materi = '';
while ($data_materi = mysqli_fetch_array($res_pertemuan)) {
	$materi = $data_materi['materi'];
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Menu Materi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		* {
	
			font-family: 'Quicksand', sans-serif;
			--text-primary: black;
			--text-secondary: #fff;
			--bg-primary: #b1e9ed;
			--bg-secondary: #517173;
			--transition-speed: 600ms;
		}

		.fakeimg {
			height: 200px;
			background: #aaa;
		}
	</style>
</head>

<body>
	<div class="container">
		<br><a href="index_dosen.php"><b>Kembali</b></a><br>
		<form action="" method="POST">
			<label>Edit Materi</label>
			<div class="form-group">
				<label for="materi">Materi </label>
				<textarea class="form-control" name="materi" rows="10" placeholder="Masukkan materi"><?=$materi?></textarea>
			</div>
			<br>
			<button type="submit" class="btn btn-primary" name="submit">Edit Materi</button>
		</form>
	</div>
</body>

</html>

<?php
if (!empty($_POST['materi'])) {
	$new_materi = $_POST['materi'];
	$q_updateMateri = "UPDATE pertemuan SET materi = '$new_materi' WHERE id_pertemuan = $id";
	if (mysqli_query($koneksi, $q_updateMateri)) {
		echo "<script>alert('Berhasil edit materi!')</script>";
		header("Location: index_dosen.php");
	}
	// $materi = intval($_POST['materi']);
	// $sql = "UPDATE pertemuan SET materi=['" . $materi . "'] WHERE id_pertemuan=" . $id . "";
	// if ($koneksi->query($sql)) {
	// 	echo "<script>alert('Berhasil edit data!')</script>";
	// 	header("Location: index_dosen.php");
	// } else {
	// 	echo $koneksi->error;
	// }
}
?>