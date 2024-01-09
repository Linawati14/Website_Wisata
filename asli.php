<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include Bootstrap CSS and FontAwesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .navbar {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .navbar-brand img {
            width: 40%;
            margin-left: 60px;
        }

        .container {
            background-color: white;
        }

        .gambar-container {
            position: relative;
            text-align: center;
        }

        .gambar-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            /* Membuat sudut gambar berbentuk oval */
        }

        .jarak {
            position: absolute;
            bottom: 0px;
            left: 0px;
            background-color: orange;
            color: white;
            padding: 10px 30px;
            border-radius: 10px;
            /* Membuat sudut jarak berbentuk oval */
        }

        .btn-rute {
            width: 100px;
            height: 40px;
            margin-top: 10px;
        }

        .alamat-info {
            font-size: 12px;
        }

        .card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .footer {
            background-color: black;
            padding: 20px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer img {
            width: 50px;
            /* Sesuaikan lebar gambar */
            height: auto;
            margin-right: 10px;
            /* Sesuaikan jarak gambar dari teks */
        }

        .sosmed img {
            width: 35px;
            /* Sesuaikan lebar gambar sosial media */
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                width: 80%;
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="./upload/LOGO_VAC_TRIP.png" alt="img">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="#">PROFILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="#">MAP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="informasi.php">INFORMASI</a>
                </li>

                <?php
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];

                    // Query untuk mendapatkan nama_lengkap dari tabel tb_pengguna
                    $query = "SELECT nama_lengkap FROM tb_pengguna WHERE id = $user_id";
                    $result = $connect->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nama_lengkap = $row['nama_lengkap'];

                        // Tampilkan nama pengguna yang login di navbar
                        echo '<a class="nav-link" style="margin-right: 20px;" href="#">
                                    <i class="fas fa-user"></i>Hai, ' . $nama_lengkap . '
                                </a>';
                    } else {
                        // Pengguna tidak ditemukan
                        echo "Data pengguna tidak ditemukan.";
                    }
                } else {
                    // Pengguna belum login
                    echo '<a class="nav-link" style="margin-right: 20px;" href="#">
                                <i class="fas fa-user"></i>Selamat datang
                            </a>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 80px;" href="#">
                        <i class="fal fa fa-sign-out-alt fa-lg" style="color: #000000;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 mb-5" style="background-color: white;">
        <div class="row">
            <div class="col-sm">
                <div class="container mt-2" style="background-color: white;">
                    <h4 class="mb-3">Museum Agung Bale</h4>
                    <div class="gambar-container">
                        <img src="./upload/Museum Bale Agung2.jpg" alt="img">
                        <div class="jarak">Jarak</div>
                    </div>
                    <button class="btn btn-outline-secondary btn-rute" style="color: black; margin-left: 5px;">Rute</button>
                    <br>
                    <span class="alamat-info">Terban, Wates, Kulon Progo, Daerah Istimewah</span>
                    <br>
                    <span class="alamat-info">Yogyakarta 55651</span>
                    <hr style="border: 1px solid grey;">
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <div class="btn btn-warning btn-block" style="color: white; border: 1px solid black;">1000</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="btn btn-warning btn-block" style="color: white; border: 1px solid black;">Pesan Tiket</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="container mt-2" style="background-color: white;">
                    <h4 class="mt-5">Deskripsi Wisata</h4>
                    <div class="gambar-container">
                    </div>
                    <p>Meseum Bale Agung berdiri tahun 1918 sebagai bangunan cagar budaya, desain arsitektur bangunan Museum Bale Agung bergaya kolonial</p>
                    <hr style="border: 1px solid grey;">
                    <div class="container mt-5">
                        <div class="card p-3">
                            <h5 class="card-title">aliyasraf</h5>
                            <div class="wadah">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>Menambah wawasan sejarah Kulon Progo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="row">
            <div class="col mt-2">
                <div class="bungkus">
                    <img src="./upload/LOGO_VAC_TRIP.png" alt="img" class="mb-3" style="width: 210px; margin-left: -100px;">
                    <div class="container mb-3" style="width: 240px; margin-left: 35px; background-color: black;">
                        <p style="font-size: 12px; text-align: justify; color: white;">
                            VAC TRIP adalah website dengan menampilkan rekomendasi tempat wisata dengan maps didalamnya memiliki fitur untuk melakukan pemesanan tiket tempat wisata, pariwisata, dan informasi mengenai tempat wisata.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-sm" style="margin-left: 60px;">
                        <div class="sosmed" style="background-color: white; width: 35px;">
                            <img src="./upload/facebook.svg" alt="img" class="mb-2">
                        </div>
                    </div>
                    <div class="col-sm" style="margin-left: -160px;">
                        <div class="sosmed" style="background-color: white; width: 35px;">
                            <img src="./upload/instagram.svg" alt="img" class="mb-2">
                        </div>
                    </div>
                    <div class="col-sm" style="margin-left: -160px;">
                        <div class="sosmed" style="background-color: white; width: 35px;">
                            <img src="./upload/twitter.svg" alt="img" class="mb-2">
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col mt-4" style="text-align: left; color: white;">
                <h3 style="text-align: left;">Kontak Kami</h3><br>
                <span>
                    <strong>Phone:</strong> +62 856 4191 3387
                </span><br><br>
                <span>
                    <strong>Email:</strong> vactripanoramakp@gmail.com
                </span><br><br>
                <span>
                    <strong>Lokasi:</strong> Banaran, Kec Banaran, Kabupaten Kulon Progro, Daerah Istimewah Yogyakarta
                </span>
            </div>
            <div class="col mt-5" style="text-align: left; color: white;">
                <span>
                    <strong>Kebijakan Privasi</strong>
                </span><br><br>
                <span>
                    <strong>Syarat dan Ketentuan</strong>
                </span><br><br>
                <span>
                    <strong> Hubungi Kami</strong>
                </span>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>