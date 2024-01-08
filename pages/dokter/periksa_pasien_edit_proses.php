<?php
    include "../../conf/conn.php";
    if($_POST){
        $id_daftar_poli = $_POST['id_daftar_poli'];
        $tgl_periksa = $_POST['tgl_periksa'];
        $catatan = $_POST['catatan'];
        $tgl_periksa = mysqli_real_escape_string($conn, $tgl_periksa);
        $catatan = mysqli_real_escape_string($conn, $catatan);

        $query = ("UPDATE periksa SET tgl_periksa = '$tgl_periksa', catatan = '$catatan'
        WHERE id_daftar_poli = $id_daftar_poli");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="../../index_dokter.php?page=daftar_periksa_pasien"</script>';
        }
    }
?>