<?php
    include "../../conf/conn.php";
    if($_POST){
        $id_daftar_poli = $_POST['id_daftar_poli'];
        $tgl_periksa = $_POST['tgl_periksa'];
        $catatan = $_POST['catatan'];
        $tgl_periksa = mysqli_real_escape_string($conn, $tgl_periksa);
        $catatan = mysqli_real_escape_string($conn, $catatan);

        $query = ("INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan) VALUES ('$id_daftar_poli','$tgl_periksa','$catatan')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index_dokter.php?page=daftar_periksa_pasien"</script>';
        }
    }
?>