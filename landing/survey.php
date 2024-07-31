<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/survey.css" id="theme-color">
    <link rel="stylesheet" href="css/adminx.css">

    <!-- Style -->
    <style>
        * {
            margin: auto;
            padding: 0;
            box-sizing: border-box;
            font-family: "Catamaran", "Roboto";
        }

        body {
            display: flex;
            background: url('img/landing.jpg');
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <!-- Koneksi database -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $database ="pkl2";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("connection failed: ".mysqli_connect_error());
    }
    ?>

    <div class="wrapper">
        <form action="">
            <h1>Survey Kepuasan</h1>

            <ul>
                <li class="form-group">
                    <div class="input-group">
                        <div class="input-box">
                            <p>Nama Mitra</p>

                            <!-- Dropdown pilih mitra -->
                            <select id="mitra-select" class="dropbtn" required>
                                <option value="">Pilih Mitra</option>
                                <?php
                                $query = "SELECT id_mitra, nama_mitra FROM mitra";
                                $result = mysqli_query($conn, $query);
                            
                                if ($result) {
                                    // Ambil data mitra
                                    if (mysqli_num_rows($result) > 0) {
                                        $mitras = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        foreach ($mitras as $mitra) {
                                            echo '<option value="' . htmlspecialchars($mitra['id_mitra']) . '">' . htmlspecialchars($mitra['nama_mitra']) . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">Tidak ada data</option>';
                                    }
                                } else {
                                    echo '<option value="">Query error</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-box">
                            <p>Tanggal Kegiatan</p>
                            <input type="date" id="tanggal-kegiatan" class="input-box" readonly>
                        </div>
                    </div>
                </li>
            </ul>

            <ul>
                <li>
                    <p>Nama Kegiatan</p>
                    <div class="input-box">
                        <input type="text" id="kegiatan" class="input-box" readonly>
                    </div>
                </li>
            </ul>

            <script>
                document.getElementById('mitra-select').addEventListener('change', function() {
                    var idMitra = this.value;
                    var kegiatanInput = document.getElementById('kegiatan');
                    
                    if (idMitra) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'get_kegiatan.php?id_mitra=' + idMitra, true);
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                var kegiatan = JSON.parse(xhr.responseText);
                                if (kegiatan.length > 0) {
                                    kegiatanInput.value = kegiatan.join(', '); // Tampilkan semua kegiatan terpisah dengan koma
                                } else {
                                    kegiatanInput.value = 'Tidak ada kegiatan';
                                }
                            }
                        };
                        xhr.send();
                    } else {
                        kegiatanInput.value = '';
                    }
                });
            </script>

            <!-- Isi pertanyaan -->
            <ul>
                <li id="form-field-3" class="likert">
                <table cellspacing="0">
                <thead>
                    <tr>
                    <th>Pertanyaan</th>
                    <td>Ya</td>
                    <td>Tidak</td>
                    </tr>
                </thead>

                    <tbody>
                        <tr class="statement3">
                        <th>
                            <label for="Field3">Apakah kegiatan berjalan dengan lancar?</label>
                        </th>
                        <td title="Ya">
                            <input id="Field3_1" name="Field3" type="radio" value="Ya" />
                        </td>
                        <td title="Tidak">
                            <input id="Field3_2" name="Field3" type="radio" value="Tidak" />
                        </td>

                        </tr>
                        <tr class="alt statement4">
                        <th>
                            <label for="Field4">Apakah kegiatan berjalan dengan tepat waktu?</label>
                        </th>
                        <td title="Ya">
                            <input id="Field4_1" name="Field4" type="radio" value="Ya" />
                        </td>
                        <td title="Tidak">
                            <input id="Field4_2" name="Field4" type="radio" value="Tidak" />
                        </td>

                        </tr>
                            <tr class="statement5">
                            <th><label for="Field5">Apakah waktu yang dialokasikan untuk kegiatan cukup?</label></th>
                        <td title="Ya">
                            <input id="Field5_1" name="Field5" type="radio" value="Ya" />
                        </td>
                        <td title="Tidak">
                            <input id="Field5_2" name="Field5" type="radio" value="Tidak" />
                        </td>

                        </tr>
                        <tr class="alt statement6">
                        <th>
                            <label for="Field6">Apakah kegiatan memberikan manfaat?</label>
                        </th>
                        <td title="Ya">
                            <input id="Field6_1" name="Field6" type="radio" value="Ya" />
                        </td>
                        <td title="Tidak">
                            <input id="Field6_2" name="Field6" type="radio" value="Tidak" />
                        </td>

                        </tr>
                        <tr class="statement7">
                        <th>
                            <label for="Field7">Apakah kegiatan ini sesuai dengan tujuan yang Anda harapkan?</label>
                        </th>
                        <td title="Ya">
                            <input id="Field7_1" name="Field7" type="radio" value="Ya" />
                        </td>
                        <td title="Tidak">
                            <input id="Field7_2" name="Field7" type="radio" value="Tidak" />
                        </td>

                        </tr>
                        <tr class="alt statement8">
                        <th>
                            <label for="Field8">Apakah Anda ingin kegiatan ini dilaksanakan kembali?</label>
                        </th>
                        <td title="Ya">
                            <input id="Field8_1" name="Field8" type="radio" value="Ya" />
                        </td>
                        <td title="Tidak">
                            <input id="Field8_2" name="Field8" type="radio" value="Tidak" />
                        </td>
                        </tr>

                        </tr>
                        <tr class="alt statement8">
                        <th>
                            <label for="Field9">Apakah Anda puas dengan kegiatan ini?</label>
                        </th>
                        <td title="Ya">
                            <input id="Field9_1" name="Field8" type="radio" value="Ya" />
                        </td>
                        <td title="Tidak">
                            <input id="Field9_2" name="Field8" type="radio" value="Tidak" />
                        </td>
                        </tr>
                    </tbody>
                </table>

                <p>Kritik/Saran</p>
                <div class="input-box">
                    <input type="text" id="kritik-saran">
                </div>
            </li>
        </ul>

            <button type="submit" class="btn-primary">
                <a href="#">Kirim</a>
            </button>
        </form>
    </div>
</body>
</html>
