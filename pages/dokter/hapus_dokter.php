<?php
    include "../../conf/conn.php";
    $id_dokter = $_GET['id'];
    $query = ("DELETE FROM dokter WHERE id ='$id_dokter'");
    if(!mysqli_query($conn,$query)){
        die(mysql_error);
    }else{
        echo '<script>alert("Data Berhasil Dihapus !!!");
		window.location.href="../../index_admin.php?page=data_dokter"</script>';
	}
?>