<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DATA PASIEN</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">

      <form role="form" method="post" action="pages/pasien/tambah_pasien_proses.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama Pasien" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                  <label>No KTP</label>
                  <input type="text" name="no_ktp" class="form-control" placeholder="No KTP" required>
                </div>
                <div class="form-group">
                  <label>No RM</label>
                  <input type="text" name="no_rm" class="form-control" placeholder="No RM" required>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" name="no_hp" class="form-control" placeholder="No Hp" required>
                </div>
                <div class="form-group">
                  <label>Poli</label>
                  <input type="text" name="poli" class="form-control" placeholder="Poli" required>
                </div>
                

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
              <br>
              <div class="box-header">
                <button type="reset" class="btn btn-secondary" role="button" title="Reset Data" value="Reset"><i class="glyphicon glyphicon-plus"></i>Reset</a>
              </div>
            </form>
            <br>

            <div class="box-body table-responsive">
              <table id="pasien" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NAMA</th>
                  <th>ALAMAT</th>
                  <th>NO KTP</th>
                  <th>NO HP</th>
                  <th>NO RM</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($conn,"SELECT * FROM pasien ORDER BY id DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['alamat'];?></td>
                  <td><?php echo $row['no_ktp'];?></td>
                  <td><?php echo $row['no_hp'];?></td>
                  <td><?php echo $row['no_rm'];?></td>
                  <td>
                    <!-- <a href="index_admin.php?page=ubah_obat&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i>Ubah</a> -->
                    <a href="pages/obat/hapus_pasien.php?id=<?=$row['id'];?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                  </td>
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
    $('#pasien').DataTable();
  });
</script>