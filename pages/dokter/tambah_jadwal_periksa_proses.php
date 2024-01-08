<?php
    include "../../conf/conn.php";
    if($_POST){
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $aktif = $_POST['aktif'];
        $id = $_POST['id_dokter'];
        $query = ("INSERT INTO jadwal_periksa(hari,jam_mulai,jam_selesai,id_dokter,aktif) 
           VALUES ('".$hari."','".$jam_mulai."','".$jam_selesai."','".$id."','".$aktif."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index_dokter.php?page=jadwal_periksa"</script>';
        }
    }
?>