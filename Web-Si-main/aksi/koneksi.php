<?php

$host = "localhost";
$user = "root";
$pss = "";
$db = "si_attitude_baru";

$koneksi = mysqli_connect($host, $user, $pss, $db);

if ($koneksi) {
    
} else {
    echo "Not Connected";
}