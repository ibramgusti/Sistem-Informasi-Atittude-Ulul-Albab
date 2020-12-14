<?php
include '../aksi/koneksi.php';
session_start();
$user = $_SESSION['username'];
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
			<div class="form-group">
				<label for="id_pertemuan">ID Pertemuan</label>
				<input type="text" class="form-control" name="id_pertemuan" placeholder="Masukkan ID Pertemuan">
			</div>
			<br>
			<div class="form-group">
				<label for="id_matkul">ID Mata Kuliah</label>
				<input type="text" class="form-control" name="id_matkul" placeholder="Masukkan ID Mata Kuliah">
			</div>
			<br>
			<label>Mata Kuliah</label>
			<div class="d-flex flex-row justify-content-between align-items-center">
				<select name="inputMatkul" class="form-control mr-1" required>
					<option>--Pilih Mata Kuliah--</option>
					<?php
					$q_matkul = "SELECT * FROM matkul where id_pengajar='$user'";
					$res_matkul = mysqli_query($koneksi, $q_matkul);
					while ($data_matkul = mysqli_fetch_array($res_matkul)) {
						var_dump($data_matkul);
					?>
						<option value="<?php echo $data_matkul['id_matkul']; ?>"><?php echo $data_matkul['nama_matkul']; ?></option>

					<?php
					}

					?>
				</select>
			</div>
			<br>
			<label>Kelas</label>
			<div class="d-flex flex-row justify-content-between align-items-center">
				<select name="inputKelas" class="form-control mr-1" required>
					<option>--Pilih Kelas--</option>
					<?php
					$q_kelas = "SELECT * FROM kelas where id_pengajar='$user";
					$res_kelas = mysqli_query($koneksi, $q_kelas);
					while ($data_kelas = mysqli_fetch_array($res_kelas)) :
					?>
						<option value="<?php echo $data_kelas['id_kelas']; ?>"><?php echo $data_kelas['nama_kelas']; ?></option>
					<?php
					endwhile
					?>
				</select>
			</div>
			<br>
			<div class="form-group">
				<label for="pertemuan">Pertemuan</label>
				<input type="text" class="form-control" name="pertemuan" placeholder="Masukkan pertemuan">
			</div>
			<br>
			<div class="form-group">
				<label for="judul">Judul Materi</label>
				<input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Materi">
			</div>
			<br>
			<div class="form-group">
				<label for="materi">Materi</label>
				<textarea class="form-control" name="materi" rows="10" placeholder="Masukkan materi"></textarea>
			</div>
			<br>
			<button type="submit" class="btn btn-primary" name="submit">Tambah Materi</button>
		</form>
	</div>
</body>

</html>

<?php
if (!empty($_POST['id_pertemuan']) && !empty($_POST['id_matkul']) && !empty($_POST['materi']) && !empty($_POST['judul']) && !empty($_POST['pertemuan'])) {
	$id_pertemuan = $_POST['id_pertemuan'];
	$id_matkul = $_POST['id_matkul'];
	$judul_materi = $_POST['judul'];
	$id_matkul = $_POST['inputMatkul'];
	$materi = $_POST['materi'];
	$pertemuan = $_POST['pertemuan'];
	$query = "INSERT INTO pertemuan (`id_pertemuan`,`id_kelas`, `pertemuan`, `judul_materi` , `materi`, `id_matkul`, `id_pengajar`) VALUES ('$id_pertemuan', '$id_matkul', '$pertemuan', '$judul_materi','$materi','$id_matkul',1)";
	var_dump($query);

	if (mysqli_query($koneksi, $query)) {
		echo "<script>alert('Berhasil edit materi!')</script>";
		header("Location: index_dosen.php");
	}
}
// INSERT INTO `pertemuan` (`id_pertemuan`, `id_matkul`, `id_kelas`, `judul_materi`, `pertemuan`, `materi`, `id_pengajar`) VALUES ('3', '1', '1', NULL, '3', NULL, '1');
?>