<?php
    include "../../conf/conn.php";
    if($_POST){

        $queryGetAntrian = "SELECT MAX(no_antrian) as last_queue_number FROM daftar_poli";
        $resultAn = mysqli_query($conn, $queryGetAntrian);

        if (!$resultAn) {
            die("Query gagal: " . mysqli_error($conn));
        }
        $rowAn = mysqli_fetch_assoc($resultAn);
        $lastQueueNumber = $rowAn['last_queue_number'];
        $lastQueueNumber = $lastQueueNumber ? $lastQueueNumber : 0;
        $no_antrian = $lastQueueNumber + 1;

        $id_pasien = $_POST['id_pasien'];
        $id_jadwal = $_POST['id_jadwal'];
        $keluhan = $_POST['keluhan'];
        $query = ("INSERT INTO daftar_poli(id_pasien,id_jadwal,keluhan,no_antrian) 
           VALUES ('".$id_pasien."','".$id_jadwal."','".$keluhan."','".$no_antrian."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Berhasil Daftar !!!"); window.location.href="../../index_pasien.php?page=daftar_poli"</script>';
        }
    }
?>

