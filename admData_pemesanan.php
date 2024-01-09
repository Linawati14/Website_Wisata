<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aplikasi Rekomendasi Wisata</title>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

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
        height: 350px;
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

<style>
    .bungkus {
        background-color: black;
        text-align: center;
    }

    .container-logo {
        margin-left: auto;
        margin-right: auto;
        max-width: 210px;
    }

    .container-text {
        max-width: 240px;
        margin-left: auto;
        margin-right: auto;
        background-color: black;
        padding: 15px;
    }

    @media (max-width: 767px) {

        .container-logo,
        .container-text {
            max-width: 100%;
        }
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand bg-transparent" href="#">
            <img src="./upload/LOGO_VAC_TRIP.png" alt="img">
        </a>
        <button class="navbar-toggler mt-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="admin-page.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="admData_pengguna.php">DATA PENGGUNA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="admData_informasi.php">INFORMASI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 30px;" href="admin-page.php">WISATA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="margin-right: 30px; color: orange;" href="admData_pemesanan.php">PEMESANAN</a>
                </li>

                <?php
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];

                    $query = "SELECT username FROM tb_user WHERE id_login = $user_id";
                    $result = $connect->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $username = $row['username'];

                        echo '<a class="nav-link" style="margin-right: 20px;" href="#">
                                    <i class="fas fa-user"></i>Hai, ' . $username . '
                                </a>';
                    } else {
                        echo "Data pengguna tidak ditemukan.";
                    }
                } else {
                    echo '<a class="nav-link" style="margin-right: 20px;" href="#">
                                <i class="fas fa-user"></i>Selamat datang
                            </a>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" style="margin-right: 80px;" href="logout-pengguna.php">
                        <i class="fal fa fa-sign-out-alt fa-lg" style="color: #000000;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_kp3.jpg);">
        <div class="container" align="center">
            <div class="row justify-content-center pb-4">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Halaman Pemesanan</h2>
                </div>
            </div>
            <div style="height: 370px;overflow-y: scroll;background-color: white;">
                <table border="1px" class="table table-bordered table-hover table-striped" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th style="width: 50%; text-align:center;">Wisata</th>
                            <th style="width: 10%; text-align:center;">Tanggal</th>
                            <th style="width: 10%; text-align:center;">Tiket</th>
                            <th style="width: 30%; text-align:center;">Harga</th>
                            <th style="width: 30%; text-align:center;">Total</th>
                            <th style="width: 30%; text-align:center;">Uang Bayar</th>
                            <th style="width: 30%; text-align:center;">Kembali</th>
                            <th style="text-align:center;" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        $no = 1;
                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($connect, "select * from tb_pemesanan where wisata like '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($connect, "select * from tb_pemesanan");
                        }

                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $no++; ?></td>
                                <td style="text-align:center;"><?php echo $d['wisata']; ?></td>
                                <td style="text-align:center;"><?php echo $d['tanggal_kunjungan']; ?></td>
                                <td style="text-align:center;"><?php echo $d['jumlah_tiket']; ?></td>
                                <td style="text-align:center;">Rp.<?php echo number_format($d['harga'], 0, '.', ','); ?></td>
                                <td style="text-align:center;">Rp.<?php echo number_format($d['total_pembayaran'], 0, '.', ','); ?></td>
                                <td style="text-align:center;">
                                    <?php
                                    echo ($d['bayar'] !== null && $d['bayar'] !== '' && $d['bayar'] !== 0) ?
                                        'Rp.' . number_format($d['bayar'], 0, '.', ',') :
                                        'Default Value'; // Change 'Default Value' to the value you want to display
                                    ?>
                                </td>

                                <td style="text-align:center;">
                                    <?php
                                    echo ($d['kembali'] !== null && $d['kembali'] !== '' && $d['kembali'] !== 0) ?
                                        'Rp.' . number_format($d['kembali'], 0, '.', ',') :
                                        'Default Value'; // Change 'Default Value' to the value you want to display
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($d['bayar'] === null || $d['bayar'] === '') {
                                        echo '<a class="btn btn-xs btn-warning" href="edit-pemesanan.php?id_pemesanan=' . $d['id_pemesanan'] . '">Proses</a>';
                                    } else {
                                        echo '<a class="btn btn-xs btn-success" href="#" disabled>Selesai</a>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="delete-pemesanan.php?id_pemesanan=<?php echo $d['id_pemesanan']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <a href="tambah-pemesanan.php" style="margin-top: 13px;" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    </section>

    <div class="footer">
        <div class="row">
            <div class="col mt-2">
                <div class="bungkus">
                    <div class="container-logo">
                        <img src="./upload/LOGO_VAC_TRIP.png" alt="img" class="mb-3" style="width: 100%;">
                    </div>
                    <div class="container-text">
                        <p style="font-size: 12px; text-align: justify; color: white;">
                            VAC TRIP adalah website dengan menampilkan rekomendasi tempat wisata dengan maps didalamnya memiliki fitur untuk melakukan pemesanan tiket tempat wisata, pariwisata, dan informasi mengenai tempat wisata.
                        </p>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
            <div class="col mt-4" style="text-align: left; color: white;">
                <h3 style="text-align: left; color: white;">Kontak Kami</h3><br>
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
                </span><br>
                <span class="">
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f fa-2xl mt-5" style="color: blue;"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram fa-2xl  ml-3" style="color: #e3e5e8;"></i></a>
                    <a href="https://www.twitter.com/"><i class="fa-brands fa-x-twitter fa-2xl  ml-3" style="color: #e3e5e8;"></i></a>
                    <a href="https://www.tiktok.com/"><i class="fa-brands fa-tiktok fa-2xl ml-3" style="color: #e3e5e8;"></i></a>
                </span>
                <script src="https://kit.fontawesome.com/e29ea9b691.js" crossorigin="anonymous"></script>
            </div>
        </div>
        <nav style="background-color: black;" class="mt-3">
            <h4 style="color: #fff; font-family: 'Times New Roman', Times, serif;">Copyright © JAVTRIP 2023</h4>
        </nav>
    </div>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>