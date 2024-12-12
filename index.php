<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once("koneksi.php");
?>

<!doctype html>
<html lang="en">
<head>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
        <!-- Preloader -->


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
            <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
            <?php
                if (isset($_SESSION['role'])) {
                    // Jika pengguna sudah login, tampilkan tombol "Logout"
                ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Logout.php">Logout (<?php echo $_SESSION['name'] ?>)</a>
                        </li>
                    </ul>
                <?php
                } else {
                    // Jika pengguna belum login, tampilkan tombol "Login" dan "Register"
                ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="index.php?page=loginAdmin">Login Admin</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?page=loginDokter">Login Dokter</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php
                }
            ?>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="dist/img/udinus.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Poliklinik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


       <!-- Sidebar Menu -->
	   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
                    if (!isset($_SESSION["role"])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=pendaftaranPasienBaru">
                    <i class="nav-icon fas fa-th"></i>
                        <p>    
                            Daftar Pasien Baru
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>        
                <?php
                    }
                ?>
                <?php
                    if (isset($_SESSION['role'])){
                        $role = $_SESSION['role'];
                        if($role == "admin"){

                        
                ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                            </a>     
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?page=obat" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Obat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=dokter" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Dokter</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=poliklinik" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Poliklinik</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=pasien" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pasien</p>
                                    </a>
                                </li>
                            </ul> 
                        </li>       
                <?php
                        }
            
                        if ($role == "dokter"){
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Master Data</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="index.php?page=profiledokter">Profil Saya</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?page=periksa">Data Pasien Periksa</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?page=riwayatpasien">Data Riwayat Pasien</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?page=jadwalperiksa">Data Jadwal Periksa</a>
                                </li>
                            </ul>
                        </li>
                <?php
                        }
                        if ($role == "pasien"){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?page=daftarPoliklinik">Daftar Poliklinik</a>
                        </li>
                <?php
                        }
                    }
                ?>
               
               
            </ul>
		</nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <container>
          <?php
            if (isset($_GET['page'])) {
                include($_GET['page'] . ".php");
            } else {
                echo "<br><h2>Selamat Datang di Poliklinik Udinus";

                if (isset($_SESSION['role'])) {
                //jika sudah login tampilkan username
                echo ", " . $_SESSION['name'] . "</h2><hr>";
                } 
            }
            ?>
        </container>
          </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



    <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
