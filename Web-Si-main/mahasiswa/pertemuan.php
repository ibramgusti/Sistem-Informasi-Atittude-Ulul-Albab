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
    if (!isset($_GET['pertemuan'], $_GET['matkul'])) {
        header('Location: ../login.php');
        exit;
    } else {
        $pertemuan = $_GET['pertemuan'];
        $namamatkul = $_GET['matkul'];
        $sql = "SELECT * FROM pertemuan, matkul WHERE pertemuan.id_matkul = matkul.id_matkul AND matkul.nama_matkul = '$namamatkul' AND pertemuan = '$pertemuan'";
        $select = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($select);
        // while () {
        
        // }
    ?>
    <h1><?php echo $data['id_matkul']; ?> / <?php echo $data['nama_matkul']?> / <?php  ?></h1>
    <table>
        <thead>
            <tr>
                <th> <?php echo $data['judul_materi']; ?> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <?php echo $data['materi']; ?></td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
</body>
</html>