<?php
    include "../../conf/conn.php";
    if($_POST){
        $nama_poli = $_POST['nama_poli'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $query = ("INSERT INTO poli(nama_poli,keterangan) 
           VALUES ('".$nama_poli."','".$keterangan."')");
        if(!mysqli_query($conn,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../../index_admin.php?page=data_poli"</script>';
        }
    }
?>