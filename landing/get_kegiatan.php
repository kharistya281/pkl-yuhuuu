<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pkl2";

// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id_mitra'])) {
    $id_mitra = mysqli_real_escape_string($conn, $_GET['id_mitra']);

    $query = "SELECT nama_kegiatan FROM kegiatan WHERE id_mitra = '$id_mitra'";
    $result = mysqli_query($conn, $query);

    $kegiatan = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $kegiatan[] = $row['nama_kegiatan'];
        }
    }

    echo json_encode($kegiatan);
}

mysqli_close($conn);
?>

<?php
header('Content-Type: application/json');

$id_mitra = isset($_GET['id_mitra']) ? intval($_GET['id_mitra']) : 0;

if ($id_mitra > 0) {
    $query = "SELECT nama_kegiatan, tanggal_kegiatan FROM kegiatan WHERE id_mitra = $id_mitra LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>