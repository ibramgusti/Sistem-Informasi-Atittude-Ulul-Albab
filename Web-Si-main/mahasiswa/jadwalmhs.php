<?php 
session_start();
include "../aksi/koneksi.php";
$user = $_SESSION['username'];
if (!isset($_SESSION["username"])) {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <link rel="stylesheet" href="../css/stylemhs.css">
    <link rel="stylesheet" href="../css/styletable.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Document</title>
</head>
<body>
    <?php 
    $namamatkul = $_GET['matkul']; //ngambil dari url
    ?>
    <section id="service">
            <div class="title-text">
            <p>Jadwal Ta'lim</p>
            <h1><?php echo $namamatkul ?></h1>
            </div>

        <div class="service-box">
    <?php 
    //query buat nampilin jadwal mahasiswa per pertemuan matkul
    $query_krs = "SELECT * FROM pertemuan, matkul WHERE pertemuan.id_matkul = matkul.id_matkul AND matkul.nama_matkul = '$namamatkul'";
    $b1 = $koneksi->query($query_krs);
    while($c1 = $b1->fetch_array()){ ?>
            <div class="single-service">
                <img src="../image/jadwal3.jpg">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3><a href="pertemuan.php?pertemuan=<?php echo $c1['pertemuan']; ?>&matkul=<?php echo $namamatkul?>" style="text-decoration: none; color: white;"><?php echo $c1['pertemuan']; ?></a></h3>
                    <!-- jadi nanti linknya, localhost/Web-Si-Main/mahasiswa/pertemuan.php?pertemuan=pertemuanke%matkul=nama_matkul-->
                    <hr>
                    <p><a href="pertemuan.php?pertemuan=<?php echo $c1['pertemuan']; ?>&matkul=<?php echo $namamatkul?>" style="text-decoration: none; color: white;"><?php echo $c1['judul_materi'] ?></a></p>
                    <!-- ini juga sama -->
                </div>
            </div>
    <?php } ?>
        </div>
    </section>

</body>
</html>