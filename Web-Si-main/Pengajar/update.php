<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_mhs = $_POST['id_mhs'];
$nm_mhs = $_POST['nm_mhs'];
$id_matkul  = $_POST['id_matkul'];
$id_kelas = $_POST['id_kelas'];
$id_pertemuan = $_POST['id_pertemuan'];
$nilai = $_POST['nilai'];

mysqli_query($koneksi,"update nilai set id_mhs='$id_mhs', id_matkul='$id_matkul', id_kelas='$id_kelas', id_pertemuan='$id_pertemuan', nilai='$nilai' where id_mhs='$id_mhs'");
if (mysqli_affected_rows($koneksi) >0 ){
	header("location:index_dosen.php");
} else{
	echo mysqli_error($koneksi);
}
?>