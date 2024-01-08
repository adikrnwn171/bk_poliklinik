<?php
  include "../../conf/conn.php";
  if($_POST){$id = $_POST['id'];
    
    $nama_poli = $_POST['nama_poli'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $query = ("UPDATE poli SET nama_poli='$nama_poli',keterangan='$keterangan' WHERE id ='$id'");
    if(!mysqli_query($conn,$query)){die(mysql_error);
    }else{
        echo '<script>alert("Data Berhasil Diubah !!!");window.location.href="../../index_admin.php?page=data_poli"</script>';}}
?>