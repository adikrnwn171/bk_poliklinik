<?php
    include "../../conf/conn.php";
    $id = $_GET['id'];
    $query = ("DELETE FROM poli WHERE id ='$id'");
    if(!mysqli_query($conn,$query)){
        die(mysql_error);
    }else{
        echo '<script>alert("Data Berhasil Dihapus !!!");
		window.location.href="../../index_admin.php?page=data_poli"</script>';
	}
?>