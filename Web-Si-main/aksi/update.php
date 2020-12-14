<?php 
include "koneksi.php";

$mhs = $_POST['id_mhs']; //ngambil dari hasil upload/submit di mhs.php
$gambar = upload(); // eksekusi function upload()

$query = "UPDATE mahasiswa SET gambar = '$gambar' WHERE id_mhs = '$mhs'";


if (!$gambar) {
    echo "<script> 
                alert('masukkan gambar terlebih dahulu');
                document.location.href = '../mahasiswa/mhs.php';
         </script>";
} else {
    echo "<script> 
                alert('gambar berhasil diupload');
                document.location.href = '../mahasiswa/mhs.php';
         </script>";
    $upd = mysqli_query($koneksi, $query);   
}
    
    // return mysqli_affected_rows($koneksi);

    function upload() {

        $namaFile = $_FILES['image']['name'];
        $ukuranFile = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmpName = $_FILES['image']['tmp_name'];
    
        //cek jenis file
        $cekEksValid = ['jpg', 'jpeg', 'png'];
        $eksImg = explode( '.', $namaFile);
        $eksImg = strtolower(end($eksImg));
        
        if (!in_array($eksImg, $cekEksValid)) {
            echo "<script>
                alert('mohon ganti tipe file!');
                </script>";
            return false;
        }
    
        // cek ukuran gambar
        if ($ukuranFile > 2000000) {
            echo "<script>
                alert('ukuran terlalu besar!');
                </script>";
            return false;
        }
        

        // lolos pengecekan
        $newfilename = uniqid();
        $newfilename .= '.';
        $newfilename .= $eksImg;
    
        move_uploaded_file($tmpName, '../image/imageMhs/'.$newfilename);
    
        return $newfilename;
    }

?>