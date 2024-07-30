<?php
require 'functions.php';

$jmlResponden = query("SELECT COUNT(id_realisasi) as total FROM realisasi_kegiatan");

if(isset($jmlResponden[0]['total'])){
  $ttlResponden = $jmlResponden[0]['total'];
} else{
  $ttlResponden = 0;
}

$jmlMitra = query("SELECT COUNT(id_mitra) as totalmitra FROM MITRA");

if(isset($jmlMitra[0]['totalmitra'])){
  $ttlMitra = $jmlMitra[0]['totalmitra'];
} else{
  $ttlMitra = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PKL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="./dist/css/adminx.css" media="screen" />

    <!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
    -->
  </head>

  <body>
    <div class="adminx-container">
      <nav class="navbar navbar-expand justify-content-between fixed-top">
        <a class="navbar-brand mb-0 h1 d-none d-md-block" href="admin.php">
          <img src="./asset/img/logos1.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
        </a>

        <form class="form-inline form-quicksearch d-none d-md-block mx-auto">
          <div class="input-group">
            <div class="input-group-prepend">
              <!-- <div class="input-group-icon">
                <i data-feather="search"></i>
              </div>
            </div>
            <input type="text" class="form-control" id="search" placeholder="Type to search..."> -->
          </div>
        </form>

        <div class="d-flex flex-1 d-block d-md-none">
          <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
          </a>
        </div>
      </nav>

      <!-- expand-hover push -->
      <!-- Sidebar -->
      <div class="adminx-sidebar expand-hover push">
        <ul class="sidebar-nav">
          <li class="sidebar-nav-item">
            <a href="admin.php" class="sidebar-nav-link active">
              <span class="sidebar-nav-icon">
                <i data-feather="home"></i>
              </span>
              <span class="sidebar-nav-name">
                Dashboard
              </span>
              <span class="sidebar-nav-end">

              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i data-feather="activity"></i>
              </span>
              <span class="sidebar-nav-name">
                Kegiatan
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="mitra.php" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i data-feather="users"></i>
              </span>
              <span class="sidebar-nav-name">
                Mitra / Instansi
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="staff.php" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i data-feather="user"></i>
              </span>
              <span class="sidebar-nav-name">
                Staff
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="dataresponden.php" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i data-feather="folder"></i>
              </span>
              <span class="sidebar-nav-name">
                Data Responden
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="#" class="sidebar-nav-link-out">
              <span class="sidebar-nav-icon">
                <i data-feather="log-out"></i>
              </span>
              <span class="sidebar-nav-name">
                Keluar
              </span>
            </a>
          </li>
        </ul>
      </div><!-- Sidebar End -->

      <!-- adminx-content-aside -->
      <div class="adminx-content">
        <!-- <div class="adminx-aside">

        </div> -->

        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h1>Home</h1>
              <h2>Selamat Datang, Admin!</h2>
            </div>
            <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">Menu</div>

                    <nav class="card-header-actions">
                      <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false" aria-controls="card1">
                        <i data-feather="minus-circle"></i>
                      </a>
                    </nav>
                  </div>
                  <div class="card-body collapse show d-flex justify-content-around" id="card1">
                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                    <a href="#" class="btn btn-primary">
                      <i data-feather="activity"></i>
                      Kegiatan</a>
                    <a href="#" class="btn btn-primary">
                      <i data-feather="users"></i>  
                      Mitra</a>
                    <a href="staff.php" class="btn btn-primary">
                      <i data-feather="user"></i>  
                      Staff</a>
                    <a href="dataresponden.php" class="btn btn-primary">
                      <i data-feather="folder"></i>
                      Data Responden</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex">
                <div class="card border-0 bg-success text-white text-center mb-grid w-100">
                  <div class="d-flex flex-row align-items-center h-100">
                    <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                      <i data-feather="users"></i>
                    </div>
                    <div class="card-body">
                      <div class="card-info-title">Jumlah Responden</div>
                      <h3 class="card-title mb-0">
                        <?= $ttlResponden; ?>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-3 d-flex">
                <div class="card border-0 bg-success text-white text-center mb-grid w-100">
                  <div class="d-flex flex-row align-items-center h-100">
                    <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                      <i data-feather="users"></i>
                    </div>
                    <div class="card-body">
                      <div class="card-info-title">Jumlah Mitra</div>
                      <h3 class="card-title mb-0">
                        <?= $ttlMitra;?>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="./dist/js/vendor.js"></script>
    <script src="./dist/js/adminx.js"></script>

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="./dist/js/vendor.js"></script>
    <script src="./dist/js/adminx.vanilla.js"></script-->
  </body>
</html>