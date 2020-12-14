<?php
//session buat mengenali pengguna per akun berdasarkan nim/id_mhs
session_start();
include "../aksi/koneksi.php";
$user = $_SESSION['username'];
if (!isset($_SESSION["username"])) { // kalo nim/id_mhs tidak ada maka..
    header('Location: ../login.php'); // kesini
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
   
    <title>Data Mahasiswa</title>
</head>
<body>
    <!-- Halaman Home -->
    <section class="banner">
        <img src="../image/ulul.png" class="logo">
        <div class="banner-text">
            <h1 class="texth1">Ulul Albab </h1>
            <p>Knowledge is of two kinds, that which is absorbed and that which is heard. </p>
            <p>And that which is heard does not profit if it is not absorbed</p>
            <div class="banner-btn">
                <a href="#"><span></span>Find Out</a>
                <a href="#"><span></span>Read More</a>
            </div>
        </div>
    </section>
    <!-- Side Nav -->
    <div id="sidenav">
        <nav>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#feature">Profil Mahasiswa</a></li>
                <li><a href="#service">Jadwal</a></li>
                <li><a href="#testimonial">Nilai</a></li>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <div id="menubtn">
        <img src="../image/menu.png" id="menu">
    </div>
    <!-- tag php buat seluruh sintaks di file mhs jadi tinggal make variable $c -->
    <?php
    $query_mhs = "SELECT * FROM mahasiswa WHERE id_mhs = '$user'";
    $b = $koneksi->query($query_mhs);
    while ($c = $b->fetch_array()) { 
            
            // if (uploadImg($c) > 0) {
            //     echo "
            //         <script> 
            //         alert('gambar berhasil diupload');
            //         </script>
            //     " ;
            // } else {
            //     echo "<script> 
            //     alert('gambar gagal diupload');
            //     </script>";
            // }
            
            ?>
    
    <!-- Halaman Progil Mahasiswa (bisa juga form update foto, niatnya bisa buat edit bio mhs juga tp blm bikin ehe) -->
    <form action="../aksi/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" id="gambarLama" value="<?php echo $c['gambar']; ?>">
    <section id="feature">    
        <div class="title-text">
            <p>Profil Mahasiswa</p>
            <!-- nama mahasiswa di bagian judul -->
            <h1><?php echo $c['nama_mhs']; ?></h1> 
        </div>
        <div class="feature-box">
            <div class="features">
                <h1>Nama Mahasiswa</h1>
                <div class="feature-desc">
                    <div class="feature-icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="feature-text">
                    <!-- nama mahasiswa -->
                        <p><?php echo $c['nama_mhs']; ?></p>
                    </div>
                </div>
                <h1>NIM</h1>
                <div class="feature-desc">
                    <div class="feature-icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="feature-text">
                    <!-- nim mahasiswa -->
                        <p><?php echo $c['id_mhs']; ?></p>
                    </div>
                </div>
                <h1>Alamat</h1>
                <div class="feature-desc">
                    <div class="feature-icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="feature-text">
                    <!-- alamat mhs -->
                        <p><?php echo $c['alamat']; ?></p>
                    </div>
                </div>
                <h1>Angkatan</h1>
                <div class="feature-desc">
                    <div class="feature-icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="feature-text">
                    <!-- angkatan mhs -->
                        <p><?php echo $c['angkatan']; ?></p>
                    </div>
                </div>
            </div>
            <div class="features-img">
                <img src="../image/imageMhs/<?php echo $c['gambar'];?>">
            </div>
        </div>
        <!-- <div class= "img-button">
        <input type="file" name="image" id="image">
        <button name="delete" id="delete"> Delete </button>
        </div> -->
        <input type="hidden" name="id_mhs" value="<?php echo $user ?>">
        <input type="file" name="image" id="image">
        <button name="upload" id="upload" type="submit"> Upload </button>
        <!-- dibawah ini gausa diliat masi blm jalan logicnya jadi tak komen ae -->
        <!-- <?php 
            // $tmp = isset($_FILES['image']['tmp_name']);
            if (!$tmp) { ?> // jika variable $tmp(penyimpanan sementara file gambar) tidak ada maka.. (tp masi belum jalan logicnya ehe)
        <button name="upload" id="upload" type="submit" disabled> Upload </button>
            <?php } else {?>
            <button name="upload" id="upload" type="submit"> Upload </button>
            <?php } ?> -->
        </form>
    </section>
    <!-- Halaman Jadwal Mahasiswa  -->
    <section id="service">
            <div class="title-text">
            <p>Jadwal Mahasiswa</p>
            <h1><?php echo $c['nama_mhs']; ?></h1>
            </div>

        <div class="service-box">
        <!-- Query buat nampilin KRS mahasiswa -->
    <?php 
    $query_krs = "SELECT * FROM mahasiswa, matkul, kelas, krs WHERE mahasiswa.id_mhs = krs.id_mhs and matkul.id_matkul = krs.id_matkul and kelas.id_kelas = krs.id_kelas and mahasiswa.id_mhs = '$user' ";
    $b1 = $koneksi->query($query_krs);
    while($c1 = $b1->fetch_array()){ ?>
            <div class="single-service">
                <img src="../image/jadwal3.jpg">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3><a href="jadwalmhs.php?matkul=<?php echo $c1['nama_matkul'] ?>&kelas=<?php echo $c1['nama_kelas'] ?>" id="underline" style="text-decoration: none; color: white;"><?php echo $c1['nama_matkul']; ?></a></h3>
                    <!-- jadi nanti linknya, localhost/Web-Si-Main/mahasiswa/jadwalmhs.php?matkul=nama_matkul&kelas=nama_kelas-->
                    <hr>
                    <a href="jadwalmhs.php?matkul=<?php echo $c1['nama_matkul'] ?>&kelas=<?php echo $c1['nama_kelas'] ?>" id="underline" style="text-decoration: none; color: white;"><?php echo $c1['hari']; ?> / <?php echo $c1['waktu']; ?> / Kelas <?php echo $c1['nama_kelas']; ?></a>
                    <!-- ini juga sama -->
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- Halaman Nilai MAhasiswa -->
    <section id="testimonial">
    <div class="title-text">
        <p>Nilai Mahasiswa</p>
        <h1><?php echo $c['nama_mhs']; ?></h1>
        </div>

        <table class="content-table">
            <tr>
                <th>NIM</th>
                <th>:</th>
                <td><?php echo $c['id_mhs']; ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <th>:</th>
                <td><?php echo $c['nama_mhs']; ?></td>
            </tr>
        </table>

        <table class="content-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $query_krs = "SELECT * FROM mahasiswa, matkul, kelas, krs WHERE mahasiswa.id_mhs = krs.id_mhs and matkul.id_matkul = krs.id_matkul and kelas.id_kelas = krs.id_kelas and mahasiswa.id_mhs = '$user' ";
            $num = 1;
            $b1 = $koneksi->query($query_krs);
            while($c1 = $b1->fetch_array()){ ?>
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $c1['id_mhs']; ?></td>
                    <td><?php echo $c1['nama_matkul']; ?></td>
                    <!-- query buat nampilin nilai belum ada soale belum tk sambungin table krs sama nilai di db -->
                    <td> </td> 
                </tr>
            <?php 
            $num++;
            }
            
            ?>
            </tbody>
        </table>
    </section>

    <script>
        var menubtn = document.getElementById("menubtn");
        var sidenav = document.getElementById("sidenav");
        var menu = document.getElementById("menu");
        sidenav.style.right == "-250px";

        menubtn.onclick = function() {
            if (sidenav.style.right == "-250px") {
                sidenav.style.right = "0";
                menu.src = "../image/menu.png";
            } else {
                sidenav.style.right = "-250px";
                menu.src = "../image/menu.png";
            }
        }

        var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 1000,
        speedAsDuration: true
        });
    </script>
    <?php } ?>
</body>
</html>
