<?php
$id_daftar_poli = $_GET['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>PERIKSA PASIEN</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-11 card">
                <form action="pages/dokter/periksa_pasien_proses.php" method="post" role="form">
                <?php
                include "conf/conn.php";
                $query=mysqli_query($conn,"SELECT * FROM periksa 
                JOIN daftar_poli ON daftar_poli.id = periksa.id_daftar_poli
                JOIN pasien ON daftar_poli.id_pasien = pasien.id 
                LEFT JOIN detail_periksa ON detail_periksa.id_periksa = periksa.id
                LEFT JOIN obat ON detail_periksa.id_obat = obat.id
                WHERE id_daftar_poli = $id_daftar_poli
                ORDER BY daftar_poli.id DESC");
                $row=mysqli_fetch_array($query);
                ?>
                <div class="form-group">
                    <label>Nama Pasien</label><br>
                    <input name="nama_pasien" value="<?php echo $row['nama']?>" class="w-100" disabled>
                    <input type="hidden" name="id_daftar_poli" value="<?php echo $id_daftar_poli?>">
                    <input type="hidden" name="id_periksa" value="<?php echo $id_periksa?>">
                    </input>
                </div>
  
                <div class="form-group">
                    <label>Tanggal Periksa</label><br>
                    <input type="datetime-local" name="tgl_periksa" class="w-100" value="<?php echo $row['tgl_periksa']?>">
                    </input>
                </div>
                <div class="form-group">
                    <label>Catatan</label><br>
                    <textarea name="catatan" class="w-100"><?php echo $row['catatan'];?>
                    </textarea>
                </div>

                <?php
                $query = "SELECT * FROM obat";
                $result = $conn->query($query);

                $poli_options = [];
                while ($row = $result->fetch_assoc()) {
                $obat_options[$row['id']] = $row['nama_obat'];
                }
                $conn->close(); ?>
                <div class="form-group">
                    <label>Obat</label><br>
                    <select name="obat" class="w-100"><?php foreach ($obat_options as $id_obat => $nama_obat){
                        echo '<option value="'.$id_obat.'">' .$nama_obat. '</option>';} ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary mb-2">Simpan </button>
                </form>
            </div>  
        </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->