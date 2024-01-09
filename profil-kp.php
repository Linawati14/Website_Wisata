<!DOCTYPE html>
<html lang="en">

<head>
  <title>Aplikasi Rekomendasi Wisata</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  <?php
  session_start();
  if (!empty($_SESSION['lat']) || isset($_SESSION['lat'])) {
  } else {
    header("location:index.php");
  }
  ?>
</head>

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
  .image-container {
    border: 2px solid #ddd;
    /* Warna dan ketebalan border sesuai kebutuhan */
    border-radius: 8px;
    /* Untuk memberikan sudut melengkung pada border (opsional) */
    overflow: hidden;
    /* Agar border tidak tumpah keluar dari konten gambar */
  }

  .image-container img {
    width: 100%;
    display: block;
  }
</style>

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
<!--  -->
<!-- <style>
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
</style> -->

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

  /* p {
    font-size: 12px;
    text-align: justify;
    color: white;
  } */

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
      <img src="./upload/LOGO_VAC_TRIP.png" alt="img" style="margin-left: 30px;">
    </a>
    <button class="navbar-toggler mx-auto mt-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-auto" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" style="margin-right: 30px;" href="home.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="margin-right: 30px; color: orange;" href="profil-kp.php">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-right: 30px;" href="map.php">MAP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-right: 30px;" href="informasi.php">INFORMASI</a>
        </li>

        <?php
        include 'koneksi.php';
        if (isset($_SESSION['user_id'])) {
          $user_id = $_SESSION['user_id'];

          $query = "SELECT nama_lengkap FROM tb_pengguna WHERE id = $user_id";
          $result = $connect->query($query);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama_lengkap = $row['nama_lengkap'];

            echo '<a class="nav-link" style="margin-right: 20px;" href="#">
                                    <i class="fas fa-user"></i>Hai, ' . $nama_lengkap . '
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

  <section class="ftco-section" id="iribilangbos">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Profil Kulon Progo</h2>
        </div>
      </div>
      <div class="image-container mb-3">
        <img src="images/k1.jpg" alt="gambar">
      </div>
      <p style="text-align: justify;"><b>SEKILAS TENTANG Kulon Progo</b></p>
      <p style="text-align: justify;">Sebelum berkunjung ke Kulon Progo, beberapa informasi tentang Kulon Progo</p><br>

      <p style="text-align: justify;"><b>Di mana Kulon Progo berada?</b></p>

      <p style="text-align: justify;">Kulon Progo atau Kulonprogo adalah sebuah kabupaten yang terletak di Daerah Istimewa Yogyakarta, Indonesia. Ibu kotanya adalah Kapanewon Wates. Kabupaten ini berbatasan dengan Kabupaten Sleman dan Kabupaten Bantul di timur, Samudra Hindia di selatan, Kabupaten Purworejo di barat, serta Kabupaten Magelang di utara. Kabupaten Kulon Progo memiliki topografi yang bervariasi dengan ketinggian antara 0 - 1000 meter di atas permukaan air laut, yang terbagi menjadi 3 wilayah meliputi :</p>

      <p style="text-align: justify;">
        a. Bagian Utara Merupakan dataran tinggi/perbukitan Menoreh dengan ketinggian antara 500 1000 meter di atas permukaan air laut, meliputi Kecamatan Girimulyo, Kokap, Kalibawang dan Samigaluh. Wilayah ini penggunaan tanah diperuntukkan sebagai kawasan budidaya konservasi dan merupakan kawasan rawan bencana tanah longsor.
      </p>

      <p style="text-align: justify;">
        b. Bagian Tengah Merupakan daerah perbukitan dengan ketinggian antara 100 500 meter di atas permukaan air laut, meliputi Kecamatan Nanggulan, Sentolo, Pengasih, dan sebagian Lendah, wilayah dengan lereng antara 2 15%, tergolong berombak dan bergelombang merupakan peralihan dataran rendah dan perbukitan.
      </p>

      <p style="text-align: justify;">
        c. Bagian Selatan Merupakan dataran rendah dengan ketinggian 0 100 meter di atas permukaan air laut, meliputi Kecamatan Temon, Wates, Panjatan, Galur, dan sebagian Lendah. Berdasarkan kemiringan lahan, memiliki lereng 0 2%, merupakan wilayah pantai sepanjang 24,9 km, apabila musim penghujan merupakan kawasan rawan bencana banjir. Luas wilayah Kabupaten Kulon Progo adalah 58.627,54 hektar, secara administratif terbagi menjadi 12 kecamatan yang meliputi 88 desa dan 930 dusun.
      </p>

      <br>

      <p style="text-align: justify;"><b>Kenapa dimanakan Kulon Progo</b></p>

      <p style="text-align: justify;">Nama Kulon Progo berarti sebelah barat Sungai Progo (kata kulon dalam Bahasa Jawa artinya barat). Kali Progo membatasi kabupaten ini di sebelah timur. Kabupaten Kulon Progo terdiri atas 12 kecamatan, yang dibagi lagi atas 88 desa dan kelurahan, serta 930 Pedukuhan (sebelum otonomi daerah dinamakan Dusun).</p>

      <br>

      <p style="text-align: justify;"><b>Jumlah penduduk</b></p>

      <p style="text-align: justify;">Jumlah penduduk Kulon Progo Tahun 2020 adalah 436.395 jiwa, dengan penduduk laki-laki sebanyak 216.167 jiwa dan penduduk perempuan sebanyak 220.228 jiwa.</p>

      <br><br>
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
            <p style=" font-size: 12px; text-align: justify; color: white;">
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>