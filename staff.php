<?php

require 'functions.php';

// Konfigurasi web page
$jumlahHalData = 5;
$jumlahData = count(query("select * from staff"));
$jumlahHal = ceil(($jumlahData/$jumlahHalData));

$halAktif = (isset($_GET["page"])) ? $_GET["page"]:1;
$mulaiData = ($jumlahHalData * $halAktif) - $jumlahHalData;

$staff = query("select * from staff limit $mulaiData, $jumlahHalData");
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
  </head>
  <body>
    <div class="adminx-container">
      <!-- Header -->
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
      <!-- // Header -->

      <!-- Sidebar -->
      <!-- expand-hover push -->
      <div class="adminx-sidebar expand-hover push">
        <ul class="sidebar-nav">
          <li class="sidebar-nav-item">
            <a href="admin.php" class="sidebar-nav-link">
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
            <a href="staff.php" class="sidebar-nav-link active">
              <span class="sidebar-nav-icon">
                <i data-feather="user"></i>
              </span>
              <span class="sidebar-nav-name">
                Staff
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="staff.php" class="sidebar-nav-link">
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
      </div>
      <!-- Sidebar end -->

      <!-- Main Content -->
      <div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item active aria-current=page">Staff</a></li>
              </ol>
            </nav>

            <div class="pb-3">
              <h1>Staff</h1>
            </div>

            <div class="row">
              <div class="col">
                <div class="card mb-grid">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">Table</div>
                    <button class="btn btn-sm btn-primary tambah" onclick="location.href='tambahstaff.php'">Tambah</button>
                  </div>
                  <div class="table-responsive-md">
                    <table class="table table-actions table-striped table-hover mb-0">
                      <thead>
                        <tr>
                          <!-- <th scope="col">
                            <label class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input table-select-all">
                              <span class="custom-control-indicator"></span>
                            </label>
                          </th> -->
                          <th scope="col">No</th>
                          <th scope="col">NIP</th>
                          <th scope="col">Nama</th>
                          <th scope="col">No Telp</th>
                          <th scope="col">Email</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <!-- <th scope="row">
                            <label class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input table-select-row">
                              <span class="custom-control-indicator"></span>
                            </label>
                          </th> -->
                          <?php
                          $no = 1;
                          foreach($staff as $row):?>
                          <td><?= $no; ?></td>
                          <td><?= $row["id_staff"]; ?></td>
                          <td><?= $row["nama_staff"]; ?></td>
                          <td><?= $row["no_telp_staff"]; ?></td>
                          <td><?= $row["email_staff"]; ?></td>
                          <!-- <td>
                            <span class="badge badge-pill badge-primary">Admin</span>
                          </td> -->
                          <td>
                            <button class="btn btn-sm btn-primary" onclick="location.href='updatestaff.php?id=<?= $row['id_staff']; ?>'">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="if (confirm('Apakah Anda yakin ingin menghapus data staff?')) { location.href='hapustaff.php?id=<?= $row['id_staff']; ?>'; }">Delete</button>
                          </td>
                        </tr>
                        <?php
                        $no++;
                        endforeach;?>
                      </tbody>
                    </table>
                    <div class="card-footer d-flex justify-content-end">
                      <ul class="pagination pagination-clean pagination-sm mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1">‹</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">›</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // Main Content -->
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.js"></script>
    
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        // Initialize feather icons
        feather.replace();
    </script>
    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
  </body>
</html>