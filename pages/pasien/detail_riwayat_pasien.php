<?php
$id_dokter = $_SESSION['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Pasien
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME </a></li>
        <li class="active"> | Riwayat Pasien </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
            <div class="box-body table-responsive">
              <table id="obat" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Tanggal Periksa</th>
                  <th>Nama Pasien</th>
                  <th>Nama Dokter</th>
                  <th>Keluhan</th>
                  <th>Catatan</th>
                  <th>Obat</th>
                  <th>Biaya</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($conn,"SELECT *,pasien.nama as nama_pasien,dokter.nama as nama_dokter FROM periksa 
                JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id
                JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                JOIN pasien ON daftar_poli.id_pasien = pasien.id
                LEFT JOIN detail_periksa ON periksa.id = detail_periksa.id_periksa
                LEFT JOIN obat ON detail_periksa.id_obat = obat.id
                WHERE id_dokter = $id_dokter
                ORDER BY periksa.id DESC");
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['tgl_periksa'];?></td>
                  <td><?php echo $row['nama_pasien'];?></td>
                  <td><?php echo $row['nama_dokter'];?></td>
                  <td><?php echo $row['keluhan'];?></td>
                  <td><?php echo $row['catatan'];?></td>
                  <td><?php echo $row['nama_obat'];?></td>
                  <td><?php echo $row['biaya_periksa'];?></td>

                </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#obat').DataTable();
  });
</script>