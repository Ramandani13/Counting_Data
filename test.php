

<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Update</title>
</head>

<body>
    <header>
        <h3>DATA UPDATE</h3>
    </header>
<!-- 
    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav> -->

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Model</th>
            <th>Casemark</th>
            <th>Urgent</th>
            <th>Tanggal</th>
            <th>Line</th>
            <th>Status</th>
          
        </tr>
    </thead>
    <tbody>

        <?php

include "koneksi.php";
 
// Fetch all users data from database
$set_jam = '60'; 
$set_menit = '04'; ///untuk setting selisih 4 menit 
$waktu_indonesia = time() + (60 * 60 * 7) ;
$waktu_yamaha = time() + (60 * 60 * -1) + (60 * 120) ;
$tanggal_yamaha_def = gmdate('Y-m-d', $waktu_yamaha);
$jam_ori = gmdate('H:i:s', $waktu_indonesia);
$jam_oriw = gmdate('H:i', $waktu_indonesia);
$tanggal_ori = gmdate('Y-m-d', $waktu_indonesia);
$nama_tahun = gmdate('Y', $waktu_indonesia);
$hari=gmdate('D', $waktu_indonesia);
$nama_bulan = gmdate('M-Y', $waktu_indonesia);
$nama_tgl = gmdate('d-m-y', $waktu_indonesia);
$nama_hari=gmdate('D', $waktu_indonesia);
$tanggal_home=gmdate(', d/m/Y  H:i:s', $waktu_indonesia);
$bulan_nama2 = gmdate('M', $waktu_indonesia);




        $sql = "SELECT * FROM tb_data_seq where tanggal ='$tanggal_ori'";
        $query = mysqli_query($koneksi, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['no']."</td>";
            echo "<td>".$siswa['model']."</td>";
            echo "<td>".$siswa['casemark']."</td>";
            echo "<td>".$siswa['urgent']."</td>";
            echo "<td>".$siswa['tanggal']."</td>";
            echo "<td>".$siswa['line']."</td>";
    

            echo "<td>";
            echo "<a href='#?no=".$siswa['no']."'>Edit</a> | ";
            echo "<a href='hapussatu.php?no=".$siswa['no']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>



    </body>
</html>