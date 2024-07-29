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

    <!-- Style -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Catamaran", "Roboto";
        }

        body {
            display: flex;
            background: url('asset/bg-5.jpg');
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .wrapper {
            width: 600px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #000;
            border-radius: 10px;
            padding: 30px 40px;
        }

        .wrapper h1 {
            font-size: 36px;
            text-align: center;
            /* color: #fff; text color*/
        }

        .wrapper p {
            font-size: 18px;
            font-weight: 500;
        }

        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            /* background: salmon; */
            /* margin: 30px 0; */
        }

        .input-box input {
            color: #000;
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(0, 0, 0, .2);
            border-radius: 40px;
            font-size: 18px;
            /* color: #fff; */
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: rgba(255, 255, 255, 0.536);
        }

        .input-box select {
            color: #000;
            width: 100%;
            height: 100%;
            background: transparent;
            border: 2px solid rgba(0, 0, 0, .2);
            border-radius: 40px;
            font-size: 18px;
            padding: 10px 20px;
            box-sizing: border-box;
        }


        .wrapper .btn,
        .wrapper .btn-last {
            /* background-color: #4cd038; */
            color: #d4ffb2;
            z-index: 2;
            border: none;
            outline: none;
            width: 25%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 250ms linear; /* Tambahkan transisi untuk efek hover */
        }

        .wrapper .btn a, .wrapper .btn-last a {
            text-decoration: none;
            color: #000;
        }

        .wrapper .btn-last {
            font-size: 18px;
            width: 18%;
            height: 38px;
            margin: 20px 0;
            float: right;
        }

        .wrapper .btn:hover,
        .wrapper .btn-last:hover {
            background-color: #4cd038;
            color: #d4ffb2;
            background: darken(50%);
            border: 1px solid rgba(0, 0, 0, .1);
            box-shadow: 1px 1px 2px rgba(255, 255, 255, .2);
            text-shadow: -1px -1px 0 darken(#fff, 9.5%);
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
            <h1>Pengisian Form Evaluasi Sosialisasi</h1>
            <ul>
                <p>Nama Mitra</p>
                <div class="input-box">
                    <!-- Dropdown pilih mitra -->
                    <select id="mitra-select" class="input-box" required>
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
            </ul>

            <ul>
                <p>Nama Kegiatan</p>
                <div class="input-box">
                    <input type="text" id="kegiatan" class="input-box" readonly>
                </div>
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

            <ul>
                <p>Apakah yang disampaikan oleh Dinas Pertanian dan Ketahanan Pangan telah direalisasikan?</p>
                <div class="choose">
                    <input type="radio" id="ya" name="realisasi" value="Ya">
                    <label for="ya">Ya</label>
                    <input type="radio" id="tidak" name="realisasi" value="Tidak">
                    <label for="tidak">Tidak</label>
                </div>
            </ul>

            <ul>
                <p>Alasan Tidak Merealisasikan</p>
                <div class="input-box">
                    <input type="text" placeholder="Jelaskan alasan tidak merealisasikan">
                </div>
            </ul>

            <ul>
                <p>Laporan Hasil Implementasi</p>
                <button type="submit" class="btn">
                    <a href="#">
                        <i class="fa fa-file"></i> Dokumen
                    </a>
                </button>
            </ul>

            <ul>
                <p>Kritik/Saran</p>
                <div class="input-box">
                    <input type="text" class="input-box">
                </div>
            </ul>

            <button type="submit" class="btn-last">
                <a href="#">Kirim</a>
            </button>
        </form>
    </div>
</body>
</html>
