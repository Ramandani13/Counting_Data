<?php

include "koneksi.php";

if( isset($_GET['no']) ){

    // ambil id dari query string
    $no = $_GET['no'];

    // buat query hapus
    $sql = "DELETE FROM tb_data_seq WHERE no=$no";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>