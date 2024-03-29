<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DAFTAR POLI</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-3 card">
            <h5 class="card-header bg-secondary rounded mt-2">Daftar Poli</h5>
            <form action="pages/pasien/daftar_poli_proses.php" method="post" role="form">
              <div class="form-group">
                <label>Nomor Rekam Medis</label>
                <?php
                $id = $_SESSION['id'];
                include "conf/conn.php";
                $query=mysqli_query($conn,"SELECT * FROM pasien WHERE id = $id");
                $row=mysqli_fetch_array($query)
                ?>
                <input readonly class="w-100" value="<?php echo $row['no_rm']?>">
                <input type="hidden" name="id_pasien" value="<?php echo $id ?>">
                </input>
              </div>
              <!-- pilih poli -->
              <?php
              $query = "SELECT * FROM poli";
              $result = $conn->query($query);
              $poli_options = [];
              while ($row = $result->fetch_assoc()){
                $poli_options[$row['id']] = $row['nama_poli'];
              }
              $conn->close(); ?>
              <div class="form-group">
                <label>Pilih Poli</label><br>
                <select name="id_poli" class="w-100" id="poli" onchange="loadDokter()"><?php foreach ($poli_options as $id => $nama_poli) {
                  echo '<option value="'.$id.'">' .$nama_poli. '</option>';}?>
                </select>
              </div>
              <!-- pilih jadwal -->
              <div class="form-group">
                <label for="dokter">Pilih Jadwal</label><br>
                <select class="w-100" name="id_jadwal" id="dokter" onchange="loadDokter()">
                </select>
              </div>
              <div class="form-group">
                <label>Keluhan</label><br>
                <textarea type="textarea" name="keluhan" class="w-100"></textarea>
              </div>
              <button type="submit" class="btn btn-secondary mb-2">Daftar </button>
            </form>
          </div>
          <div class="col-9">
            <h5 class="card-header bg-secondary rounded mt-2">Riwayat Daftar Poli</h5>
            <table id="riwayat" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Poli</th>
                  <th>Dokter</th>
                  <th>Hari</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Antrian</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $id_pasien = $_SESSION['id'];
                $no=0;
                $query=mysqli_query($conn,"SELECT * FROM daftar_poli
                  JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                  JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                  JOIN poli ON dokter.id_poli = poli.id
                  WHERE id_pasien=$id_pasien ORDER BY daftar_poli.id DESC");
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_poli'];?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['hari'];?></td>
                  <td><?php echo $row['jam_mulai'];?></td>
                  <td><?php echo $row['jam_selesai'];?></td>
                  <td><?php echo $row['no_antrian'];?></td>
                  <td>
                    <a href="#" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i>Detail</a>
                  </td>
                </tr>

                <?php } ?>

                </tbody>
              </table>
          </div>
        
        </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#riwayat').DataTable();
  });
</script>

<script>
    var dokterOptions = <?php echo json_encode(getDokterOptions()); ?>;

    function loadDokter() {
        var poliId = document.getElementById("poli").value;
        var dokterSelect = document.getElementById("dokter");

        // Menghapus semua opsi dokter dan jadwal
        dokterSelect.innerHTML = "";

        // Menambahkan opsi dokter sesuai poli yang dipilih
        for (var i = 0; i < dokterOptions.length; i++) {
            if (dokterOptions[i].id_poli == poliId) {
                var option = document.createElement("option");
                option.value = dokterOptions[i].id;
                option.text = dokterOptions[i].nama + "|" + dokterOptions[i].hari + "|" + dokterOptions[i].jam_mulai + "-" + dokterOptions[i].jam_selesai;
                dokterSelect.add(option);
            }
        }
    }
</script>

<?php
// Fungsi untuk mendapatkan opsi dokter dari database
function getDokterOptions() {
    include "conf/conn.php";

    // Query untuk mengambil data dokter dari tabel dokter
    $result = $conn->query("SELECT * FROM dokter JOIN jadwal_periksa ON jadwal_periksa.id_dokter = dokter.id");

    // Inisialisasi array untuk menampung data dokter
    $dokterOptions = array();

    // Fetch data dokter sebagai array associative
    while ($row = $result->fetch_assoc()) {
        $dokterOptions[] = $row;
    }

    // Tutup koneksi
    $conn->close();

    return $dokterOptions;
}
?>