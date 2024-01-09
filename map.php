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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<?php
session_start();

if (!empty($_SESSION['lat'])) {
} else {
  header("location:index.php");
}
include "koneksi.php";
?>

<style>
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

  /* @media (max-width: 768px) {
    .navbar-brand img {
      width: 80%;
      margin-left: 0;
    }
  } */
</style>

<style>
  /* Gaya khusus untuk tampilan desktop */
  @media (min-width: 768px) {
    .navbar {
      height: 80px;
      /* Sesuaikan dengan kebutuhan Anda */
    }

    .navbar-brand {
      margin-top: 0;
      /* Sesuaikan dengan kebutuhan Anda */
    }

    .navbar-toggler {
      margin-top: 15px;
      /* Sesuaikan dengan kebutuhan Anda */
    }

    .navbar-nav {
      margin-top: 15px;
      /* Sesuaikan dengan kebutuhan Anda */
    }

    .hero-wrap {
      height: 500px;
      /* Sesuaikan dengan kebutuhan Anda */
    }

    .hero-wrap h1 {
      font-size: 2.5em;
      /* Sesuaikan dengan kebutuhan Anda */
    }
  }

  /* Gaya khusus untuk tampilan mobile */
  @media (max-width: 767px) {
    .navbar {
      height: auto;
    }

    .navbar-brand,
    .navbar-toggler,
    .navbar-nav {
      margin-top: 0;
    }

    .hero-wrap {
      height: 300px;
      /* Sesuaikan dengan kebutuhan Anda */
    }

    .hero-wrap h1 {
      font-size: 1.5em;
      /* Sesuaikan dengan kebutuhan Anda */
    }
  }

  /* Gaya umum */
  .navbar {
    background-color: #333;
  }

  .navbar-dark .navbar-toggler-icon {
    background-color: #fff;
  }

  /* .hero-wrap {
    background-image: url('images/home1.jpg');
    background-size: cover;
    background-position: center center;
    position: relative;
    overflow: hidden;
  } */

  /* .hero-wrap .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    background: rgba(0, 0, 0, 0.5);
  } */

  /* .hero-wrap h1,
  .hero-wrap p {
    color: #fff;
    z-index: 1;
    position: relative;
  } */
</style>

<style>
  .navbar {
    height: 120px;
  }

  .navbar-brand {
    margin-top: 0;
  }

  .navbar-toggler {
    margin-top: 15px;
  }

  .navbar-nav {
    margin-top: 15px;
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

  p {
    font-size: 12px;
    text-align: justify;
    color: white;
  }

  @media (max-width: 767px) {

    .container-logo,
    .container-text {
      max-width: 100%;
    }
  }
</style>

<style>
  .project-destination {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .project-destination:hover {
    transform: scale(1.05);
  }

  .project-destination .img {
    display: block;
    width: 100%;
    height: 200px;
    /* Sesuaikan dengan kebutuhan tinggi gambar */
    background-size: cover;
    background-position: center;
  }

  .project-destination .text {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 15px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
  }

  .project-destination h3 {
    margin: 0;
    font-size: 16px;
  }

  .project-destination span {
    font-size: 12px;
    display: block;
    margin-top: 5px;
  }
</style>

<style>
  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Sesuaikan nilai bayangan sesuai kebutuhan */
    transition: box-shadow 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    /* Sesuaikan nilai bayangan saat hover sesuai kebutuhan */
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent ftco-navbar-light">
    <div class="container">
      <a class="navbar-brand bg-transparent" href="#">
        <!-- <img src="./upload/LOGO_VAC_TRIP.png" alt="img"> -->
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto" style="background-color: transparent; text-align: center;">
          <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="profil-kp.php" class="nav-link">Profil</a></li>
          <li class="nav-item active"><a href="map.php" class="nav-link">Map</a></li>
          <li class="nav-item"><a href="informasi.php" class="nav-link">Informasi</a></li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION['user_id'])) {
              $user_id = $_SESSION['user_id'];

              $query = "SELECT nama_lengkap FROM tb_pengguna WHERE id = $user_id";
              $result = $connect->query($query);

              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nama_lengkap = $row['nama_lengkap'];

                echo '<a class="nav-link" style="margin-right: 0px;" href="#">
                                        <i class="fas fa-user"></i>Hai, ' . $nama_lengkap . '
                                    </a>';
              } else {
                echo "Data pengguna tidak ditemukan.";
              }
            } else {
              echo '<a class="nav-link" style="margin-right: 0px;" href="#">
                                    <i class="fas fa-user"></i>Selamat datang
                                </a>';
            }
            ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="margin-right: 0px;" href="logout-pengguna.php">
              <i class="fal fa fa-sign-out-alt fa-lg" style="color: white;"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/maps1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>

    <!-- main-section-start -->
    <div class="container" style="padding-top: 135px;color: white;" align="center">
      <div class="btn btn-warning mb-3" style="color: #fff;">Peta Wisata kulon Progo</div>
    </div>
    <div style="margin-top: -25px;padding: 25px;" class="wow fadeInUp delay-04s">
      <?php include "koneksi.php"; ?>

      <!DOCTYPE html>
      <html>

      <head>

        <style>
          #map-container {
            height: 400px;
            width: 80%;
            margin-left: 10%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          }
        </style>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCjviEPPRZvBG-PZnoFQ2JhVyTIlfXS4k">
        </script>
        <script>
          var marker;

          function initialize() {
            var mapCanvas = document.getElementById('map-container');
            var mapOptions = {
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var zom = 15;
            var uluru = {
              lat: <?php echo $_SESSION['lat']; ?>,
              lng: <?php echo $_SESSION['long']; ?>
            };
            var map = new google.maps.Map(
              document.getElementById('map-container'), {
                zoom: zom,
                center: uluru
              });
            var infoWindow = new google.maps.InfoWindow;
            var bounds = new google.maps.LatLngBounds();

            function bindInfoWindow(marker, map, infoWindow, html) {
              google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
              });
            }

            function addMarker(lat, lng, info, id) {
              var pt = new google.maps.LatLng(lat, lng);
              bounds.extend(pt);
              var marker = new google.maps.Marker({
                map: map,
                position: pt
              });
              var contentString = '<h3 align="center">' + info + '</h3>' +
                '<p align="center"><a href="profil.php?id=' + id + '" class="link_detail btn btn-primary">Lihat Detail</a>';
              bindInfoWindow(marker, map, infoWindow, contentString);
            }

            <?php
            $query = mysqli_query($connect, "SELECT * from tb_wisata");

            while ($data = mysqli_fetch_array($query)) {
              $lat = $data['latitude'];
              $lon = $data['longitude'];
              $nama = $data['nama'];
              $id = $data['id_wisata'];
              echo ("addMarker($lat, $lon, '<b>$nama</b>','$id');\n");
            }
            ?>
          }
          google.maps.event.addDomListener(window, 'load', initialize);
        </script>
      </head>

      <body>
        <div id="map-container"></div>
      </body>

      </html>
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
            <p>
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
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>