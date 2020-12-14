<!DOCTYPE html>
<link rel="stylesheet" href="../css/input.css">
<html>
<body>
	<?php
	include '../aksi/koneksi.php';
	$id_mhs = $_GET['id_mhs'];
	$data = mysqli_query($koneksi,"SELECT * FROM nilai, mahasiswa WHERE nilai.id_mhs = mahasiswa.id_mhs AND mahasiswa.id_mhs='$id_mhs' ORDER BY mahasiswa.id_mhs DESC");
	while($d= mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nim Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_mhs" class="form-control" size="4" value="<?php echo $d['id_mhs']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nm_mhs" class="form-control" value="<?php echo $d['nama_mhs']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Matkul</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_matkul" class="form-control" value="<?php echo $d['id_matkul']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Kelas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_kelas" class="form-control" value="<?php echo $d['id_kelas']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Pertemuan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_pertemuan" class="form-control" value="<?php echo $d['id_pertemuan']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nilai</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nilai" class="form-control" value="<?php echo $d['nilai']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<a href="index_dosen.php?page=index_dosen_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
		<?php 
	}
	?>
</body>
</html>

		