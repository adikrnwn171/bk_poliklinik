<?php
    include "../../conf/conn.php";
    if($_POST){

        $queryGetRm = "SELECT MAX(SUBSTRING(no_rm, 8)) as last_queue_number FROM pasien";
        $resultRm = mysqli_query($conn, $queryGetRm);

        if (!$resultRm) {
            die("Query gagal: " . mysqli_error($conn));
        }
        $rowRm = mysqli_fetch_assoc($resultRm);
        $lastQueueNumber = $rowRm['last_queue_number'];
        $lastQueueNumber = $lastQueueNumber ? $lastQueueNumber : 0;
        $tahun_bulan = date("Ym");
        $newQueueNumber = $lastQueueNumber + 1;
        $no_rm = $tahun_bulan . "-" . str_pad($newQueueNumber, 3, '0', STR_PAD_LEFT);

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_ktp = $_POST['no_ktp'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];
        $query = ("INSERT INTO pasien(nama,alamat,no_ktp,no_hp,password,no_rm) 
           VALUES ('".$nama."','".$alamat."','".$no_ktp."','".$no_hp."','".$password."','".$no_rm."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Berhasil registrasi !!!"); window.location.href="../../index_pasien.php"</script>';
        }
    }
?>

