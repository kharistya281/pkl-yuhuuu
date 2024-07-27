<?php
// session_start();

// if(!isset($_SESSION["login"])){
//     header("Location: login.php");
//     exit;
// }

require 'functions.php';

$idstaff = $_GET["id"];

if(deleteStaff($idstaff) > 0){
    echo "
    <script>
        alert('Berhasil menghapus data staff');
        document.location.href = 'staff.php';
    </script>
    ";
} else{
    echo "
    <script>
        alert('Gagal menghapus data staff');
        document.location.href = 'staff.php';
    </script>
    ";
}
?>