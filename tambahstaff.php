<?php
session_start();

// CHECK SESSION FOR LOGIN 
// if(!isset($_SESSION["login"])){
//   header("Location: login.php");
//   exit;
// }

require 'functions.php';

if(isset($_POST["submit"])){
  // var_dump($_POST);
  // die;
  if(tambahStaff($_POST) > 0){
    // var_dump($_POST);
    echo "
        <script>
            alert('Tambah data staff berhasil');
            document.location.href = 'staff.php';
        </script>
        ";
  } else{
    // echo"gagal menambah data";
    echo "<script>
            alert('Gagal menambah data staff');
            document.location.href = 'staff.php';
        </script>";
  }
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

      <!-- sidebar -->
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
            <a href="#" class="sidebar-nav-link">
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
      <!-- end sidebar -->

      <!-- Main Content -->
      <div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item"><a href="staff.php">Staff</a></li>
                <li class="breadcrumb-item active  aria-current="page">Tambah Staff</li>
              </ol>
            </nav>
            <!-- End BreadCrumb -->

            <div class="pb-3">
              <h1>Tambah Data Staff</h1>
            </div>

            <div class="row">
              <div class="col">
                <div class="card mb-grid">
                  <div class="card-header">
                    <div class="card-header-title">Form Tambah Staff</div>
                  </div>
                  <form action="" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label class="form-label">NIP</label>
                        <input class="form-control mb-2 input-credit-card" type="text" placeholder="Masukkan NIP" name="nip" require>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input class="form-control input-date mb-2" type="text" placeholder="Masukkan Nama" name="nama" require>
                      </div>
                      <div class="form-group">
                        <label class="form-label">No Telp</label>
                        <input class="form-control input-numeral mb-2" type="text" placeholder="Masukkan No Telp" name="notelp" require>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <input class="form-control input-prefix mb-2" type="text" placeholder="Masukkan Email" name="email" require>
                      </div>
                        <button class="btn btn-sm btn-primary" name="submit" type="submit" onclick="return confirm('Yakin data disimpan?')">
                          Simpan
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="location.href='staff.php'">Batal</button>
                    </div> 
                  </form>
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

    <script>
      var choices = new Choices('.js-choice');

      var choices2 = new Choices('.js-choice-remove', {
        removeItemButton: true,
      });

      var cleave = new Cleave('.input-credit-card', {
        creditCard: true,
        onCreditCardTypeChanged: function (type) {
          // update UI ...
        }
      });

      var cleave2 = new Cleave('.input-date', {
        date: true,
        datePattern: ['Y', 'm', 'd']
      });

      var cleave3 = new Cleave('.input-numeral', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
      });

      var cleave = new Cleave('.input-prefix', {
          prefix: 'INVOICE-',
          uppercase: true
      });

      flatpickr(".date-default", {
        allowInput: true
      });
      flatpickr(".date-time", {
        allowInput: true,
        enableTime: true,
      });
      flatpickr(".date-human", {
        allowInput: true,
        altInput: true,
      });
      flatpickr(".date-inline", {
        allowInput: true,
        inline: true,
      });
    </script>
  </body>
</html>