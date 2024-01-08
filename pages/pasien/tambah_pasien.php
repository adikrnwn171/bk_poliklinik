<head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
        <div class="login-logo">
            <a><b>Poli</b>klinik</a>
            <hr>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Daftar sebagai pasien</p>
            <form action="tambah_pasien_proses.php" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input name="nama" class="form-control" placeholder="Nama">
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" placeholder="Alamat" >
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>No KTP</label>
                <input name="no_ktp" class="form-control" placeholder="No KTP" >
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input name="no_hp" class="form-control" placeholder="No HP" >
                <div class="input-group-append">
                </div>
            </div>
            <!-- <div class="form-group">
                <label>No RM</label>
                <input name="no_rm" class="form-control" placeholder="No RM" >
                <div class="input-group-append">
                </div>
            </div> -->
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" >
                <div class="input-group-append">
                </div>
            </div>
            <div class="row">
                
                <!-- /.col -->
                <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
            <a>Sudah punya akun?</a> 
            <a href='../../login_pasien.php'> Login</a>          
            </form>
            <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>