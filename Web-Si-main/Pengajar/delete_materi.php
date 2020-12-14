<?php
session_start();
include '../aksi/koneksi.php';
$id = @$_GET['id'];

$sql = "DELETE FROM pertemuan WHERE id_pertemuan='".$id."'";

if($koneksi->query($sql)) {
			echo "<script>alert('Sukses Hapus Barang')</script>";
			header("Location: index_dosen.php");
		}else{
			echo $koneksi->error;
		}
?>