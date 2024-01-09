<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aplikasi Rekomendasi Wisata</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

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

    <script src="j/jquery.1.8.3.min.js"></script>
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
    <?php
    session_start();
    if (!empty($_SESSION['lat']) || isset($_SESSION['lat'])) {
    } else {
        header("location:index.php");
    }

    function getDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $earth_radius = 6371;

        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        return $d;
    }

    $lokasi1Lat = $_SESSION['lat']; //garis bujur lokasi 1
    $lokasi1Lon = $_SESSION['long']; //garis lintang lokasi 1

    include "koneksi.php";
    $id = $_GET['id'];
    $query_mysql =  mysqli_query($connect, "SELECT * FROM tb_wisata where id_wisata = '$id'") or die(mysqli_error($connect));

    ?>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="#">VAC TRI<span>Panorama Kulon Progo</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="profil-kp.php" class="nav-link">Profil</a></li>
          <li class="nav-item active"><a href="map.php" class="nav-link">Map</a></li>
          <li class="nav-item active"><a href="informasi.php" class="nav-link">Informasi</a></li>
          <li class="nav-item cta"><a href="login.php" class="nav-link">Login</a></li>

        </ul>
      </div>
    </div>
  </nav> -->
    <!-- END nav -->

    <!-- Copyku -->
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
            <?php
            while ($data = mysqli_fetch_array($query_mysql)) {
                $lokasi2Lat = $data['latitude']; //garis bujur lokasi 2
                $lokasi2Lon = $data['longitude']; //garis lintang lokasi 2
                $hasil = getDistance($lokasi1Lat, $lokasi1Lon, $lokasi2Lat, $lokasi2Lon);

            ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="container mt-2" style="background-color: white;">
                            <h4 class="mb-3"><?php echo $data['nama']; ?></h4>
                            <div class="gambar-container">
                                <img src="upload/<?php echo $data['nama']; ?><?php echo $data['gambar']; ?>" alt="img">
                            <?php } ?>
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
    <!-- End Copyku -->

    <section class="ftco-section" id="iribilangbos" style="text-align: center;">
        <div class="container" align="center" style="margin: 0 auto;">
            <?php
            while ($data = mysqli_fetch_array($query_mysql)) {
                $lokasi2Lat = $data['latitude']; //garis bujur lokasi 2
                $lokasi2Lon = $data['longitude']; //garis lintang lokasi 2
                $hasil = getDistance($lokasi1Lat, $lokasi1Lon, $lokasi2Lat, $lokasi2Lon);

            ?>
                <div class="row d-flex" style="margin-top: 13px;" align="center" style="margin: 0 auto;">
                    <div class="col-md-4 d-flex ftco-animate" style="margin-left: auto;">
                        <div class="blog-entry justify-content-end">
                            <h4><?php echo $data['nama']; ?></h4>
                            <a href="#" class="block-20" style="width:400px;background-image: url('upload/<?php echo $data['nama']; ?><?php echo $data['gambar']; ?>');">
                            </a>
                            <div class="text mt-3 float-right d-block" style="">
                                <div style="width: 120px;" class="d-flex align-items-center mb-4 topp">
                                    <div class="one">
                                        <h5 style="color: white;margin-top: 7px;"><?php echo number_format($hasil, 2); ?></h5>
                                    </div>
                                    <div class="two">
                                        <span class="mos" style="margin-left: -3px;"> Km</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate" style="margin-right: auto;">
                        <div style="margin-top: 20px;" class="blog-entry justify-content-end">
                            <div class="text mt-3 float-right d-block" align="justify">
                                <p style="margin-top: 40px;"></p>
                                <p><?php echo $data['deskripsi']; ?>.</p>
                                <p>Wisata ini beralamat di <?php echo $data['alamat']; ?></p>
                                <a class="btn btn-primary" style="width: 150px;margin-left: 20%;" href="rute.php?id=<?php echo $data['id_wisata'] ?>"> Rute</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </section>
    <footer class="ftco-footer gm-bottom" style="background-image: url(images/footer-gm.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This web is made by Fazjar Sekti Aji supported with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    <script>
        $(document).ready(function() {
            $("div.desc").hide();
            $("#sejarah").show();
            $("input[name$='sejarah']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#" + test).show();
            });
            $("input[name$='alam']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#" + test).show();
            });
            $("input[name$='budaya']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#" + test).show();
            });
            $("input[name$='kuliner']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#" + test).show();
            });
            $("input[name$='religi']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#" + test).show();
            });
            $("input[name$='belanja']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#" + test).show();
            });
        });
    </script>

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
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>