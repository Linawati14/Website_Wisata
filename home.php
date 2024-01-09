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
  <?php
  session_start();
  if (!empty($_SESSION['lat']) || isset($_SESSION['lat'])) {
  } else {
    header("location:index-home.php");
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

  $lokasi1Lat = $_SESSION['lat'];
  $lokasi1Lon = $_SESSION['long'];

  include "koneksi.php";

  $query_mysql =  mysqli_query($connect, "SELECT * FROM tb_wisata") or die(mysqli_error($connect));

  $countsejarah = 0;
  $countalam = 0;
  $countbudaya = 0;
  $countkuliner = 0;
  $countreligi = 0;
  $countbelanja = 0;

  while ($data = mysqli_fetch_array($query_mysql)) {

    $lokasi2Lat = $data['latitude']; //garis bujur lokasi 2
    $lokasi2Lon = $data['longitude']; //garis lintang lokasi 2
    $hasil = getDistance($lokasi1Lat, $lokasi1Lon, $lokasi2Lat, $lokasi2Lon);
    //save ke array
    if ($data['kategori'] == "sejarah") {
      $sejarah[$countsejarah] =
        [
          "id" => $data['id_wisata'],
          "nama" => $data['nama'],
          "alamat" => $data['alamat'],
          "lat" => $data['latitude'],
          "gambar" => $data['gambar'],
          "long" => $data['longitude'],
          "hasil" => $hasil
        ];
      $countsejarah = $countsejarah + 1;
    } else if ($data['kategori'] == "alam") {
      $alam[$countalam] =
        [
          "id" => $data['id_wisata'],
          "nama" => $data['nama'],
          "alamat" => $data['alamat'],
          "lat" => $data['latitude'],
          "gambar" => $data['gambar'],
          "long" => $data['longitude'],
          "hasil" => $hasil
        ];
      $countalam = $countalam + 1;
    } else if ($data['kategori'] == "budaya") {
      $budaya[$countbudaya] =
        [
          "id" => $data['id_wisata'],
          "nama" => $data['nama'],
          "alamat" => $data['alamat'],
          "lat" => $data['latitude'],
          "gambar" => $data['gambar'],
          "long" => $data['longitude'],
          "hasil" => $hasil
        ];
      $countbudaya = $countbudaya + 1;
    } else if ($data['kategori'] == "kuliner") {
      $kuliner[$countkuliner] =
        [
          "id" => $data['id_wisata'],
          "nama" => $data['nama'],
          "alamat" => $data['alamat'],
          "lat" => $data['latitude'],
          "gambar" => $data['gambar'],
          "long" => $data['longitude'],
          "hasil" => $hasil
        ];
      $countkuliner = $countkuliner + 1;
    } else if ($data['kategori'] == "religi") {
      $religi[$countreligi] =
        [
          "id" => $data['id_wisata'],
          "nama" => $data['nama'],
          "alamat" => $data['alamat'],
          "lat" => $data['latitude'],
          "gambar" => $data['gambar'],
          "long" => $data['longitude'],
          "hasil" => $hasil
        ];
      $countreligi = $countreligi + 1;
    } else if ($data['kategori'] == "belanja") {
      $belanja[$countbelanja] =
        [
          "id" => $data['id_wisata'],
          "nama" => $data['nama'],
          "alamat" => $data['alamat'],
          "lat" => $data['latitude'],
          "gambar" => $data['gambar'],
          "long" => $data['longitude'],
          "hasil" => $hasil
        ];
      $countbelanja = $countbelanja + 1;
    }
  }
  //array sort
  function sorts($a, $b)
  {
    if ($a["hasil"] == $b["hasil"]) return 0;
    return ($a["hasil"] < $b["hasil"]) ? -1 : 1;
  }

  usort($sejarah, "sorts");
  usort($alam, "sorts");
  usort($budaya, "sorts");
  usort($kuliner, "sorts");
  usort($religi, "sorts");
  usort($belanja, "sorts");

  for ($i = 0; $i < 4; $i++) {
    if (!empty($sejarah[$i]["id"]) || isset($sejarah[$i]["id"])) {
      $sejarah1[$i][0] = $sejarah[$i]["id"];
      $sejarah1[$i][1] = $sejarah[$i]["nama"];
      $sejarah1[$i][2] = $sejarah[$i]["gambar"];
      $sejarah1[$i][3] = $sejarah[$i]["alamat"];
      $sejarah1[$i][4] = $sejarah[$i]["lat"];
      $sejarah1[$i][5] = $sejarah[$i]["long"];
      $sejarah1[$i][6] = number_format($sejarah[$i]["hasil"], 2);
    }
  }
  for ($i = 0; $i < 4; $i++) {
    if (!empty($alam[$i]["id"]) || isset($alam[$i]["id"])) {
      $alam1[$i][0] = $alam[$i]["id"];
      $alam1[$i][1] = $alam[$i]["nama"];
      $alam1[$i][2] = $alam[$i]["gambar"];
      $alam1[$i][3] = $alam[$i]["alamat"];
      $alam1[$i][4] = $alam[$i]["lat"];
      $alam1[$i][5] = $alam[$i]["long"];
      $alam1[$i][6] = number_format($alam[$i]["hasil"], 2);
    }
  }
  for ($i = 0; $i < 4; $i++) {
    if (!empty($budaya[$i]["id"]) || isset($budaya[$i]["id"])) {
      $budaya1[$i][0] = $budaya[$i]["id"];
      $budaya1[$i][1] = $budaya[$i]["nama"];
      $budaya1[$i][2] = $budaya[$i]["gambar"];
      $budaya1[$i][3] = $budaya[$i]["alamat"];
      $budaya1[$i][4] = $budaya[$i]["lat"];
      $budaya1[$i][5] = $budaya[$i]["long"];
      $budaya1[$i][6] = number_format($budaya[$i]["hasil"], 2);
    }
  }
  for ($i = 0; $i < 4; $i++) {
    if (!empty($kuliner[$i]["id"]) || isset($kuliner[$i]["id"])) {
      $kuliner1[$i][0] = $kuliner[$i]["id"];
      $kuliner1[$i][1] = $kuliner[$i]["nama"];
      $kuliner1[$i][2] = $kuliner[$i]["gambar"];
      $kuliner1[$i][3] = $kuliner[$i]["alamat"];
      $kuliner1[$i][4] = $kuliner[$i]["lat"];
      $kuliner1[$i][5] = $kuliner[$i]["long"];
      $kuliner1[$i][6] = number_format($kuliner[$i]["hasil"], 2);
    }
  }
  for ($i = 0; $i < 4; $i++) {
    if (!empty($religi[$i]["id"]) || isset($religi[$i]["id"])) {
      $religi1[$i][0] = $religi[$i]["id"];
      $religi1[$i][1] = $religi[$i]["nama"];
      $religi1[$i][2] = $religi[$i]["gambar"];
      $religi1[$i][3] = $religi[$i]["alamat"];
      $religi1[$i][4] = $religi[$i]["lat"];
      $religi1[$i][5] = $religi[$i]["long"];
      $religi1[$i][6] = number_format($religi[$i]["hasil"], 2);
    }
  }
  for ($i = 0; $i < 4; $i++) {
    if (!empty($belanja[$i]["id"]) || isset($belanja[$i]["id"])) {
      $belanja1[$i][0] = $belanja[$i]["id"];
      $belanja1[$i][1] = $belanja[$i]["nama"];
      $belanja1[$i][2] = $belanja[$i]["gambar"];
      $belanja1[$i][3] = $belanja[$i]["alamat"];
      $belanja1[$i][4] = $belanja[$i]["lat"];
      $belanja1[$i][5] = $belanja[$i]["long"];
      $belanja1[$i][6] = number_format($belanja[$i]["hasil"], 2);
    }
  }
  ?>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
        <ul class="navbar-nav ml-auto" style="text-align: center;">
          <li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="profil-kp.php" class="nav-link">Profil</a></li>
          <li class="nav-item"><a href="map.php" class="nav-link">Map</a></li>
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

  <div class="hero-wrap js-fullheight" style="background-image: url('images/home1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <a href="#home" class="icon-video d-flex align-items-center justify-content-center mb-4">
            <span class="ion-ios-play"></span>
          </a>
          <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="text-align: center;">Welcome to Kulon Progo</p>
          <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Jelajahi Wisata Kulon Progo</h1>
        </div>
      </div>
    </div>
  </div>


  <section class="ftco-section" id="home">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Destinasi terdekat</h2>
        </div>
        <div class="inline-block" align="center">
          <input style="background-color: #f9ab30;margin-bottom:  10px; border:none; color: white;" type="submit" name="sejarah" value="sejarah" class="nav-item cta btn btn-warning" />
          <input style="background-color: #f9ab30;margin-bottom:  10px; border:none; color: white;" type="submit" name="alam" value="alam" class="nav-item cta btn btn-warning" />
          <input style="background-color: #f9ab30;margin-bottom:  10px; border:none; color: white;" type="submit" name="budaya" value="budaya" class="nav-item cta btn btn-warning" />
          <input style="background-color: #f9ab30;margin-bottom:  10px; border:none; color: white;" type="submit" name="kuliner" value="kuliner" class="nav-item cta btn btn-warning" />
          <input style="background-color: #f9ab30;margin-bottom:  10px; border:none; color: white;" type="submit" name="religi" value="religi" class="nav-item cta btn btn-warning" />
          <input style="background-color: #f9ab30;margin-bottom:  10px; border:none; color: white;" type="submit" name="belanja" value="belanja" class="nav-item cta btn btn-warning" />
        </div>
      </div>
      <!-- <div class="card"> -->
      <div class="desc" id="sejarah">
        <div class="row">
          <?php
          foreach ($sejarah1 as $value) {
          ?>
            <div class="col-md-3 ftco-animate" style="margin-bottom: 13px;">
              <div class="card">
                <span class="ml-2"><?= $value[1] ?></span>
                <div class="project-destination">
                  <?php if ($value[2] == 'Tidak ada') { ?>
                    <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/no.jpg');">
                    <?php } else { ?>
                      <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/<?php echo $value[1]; ?><?php echo $value[2]; ?>');">
                      <?php } ?>
                      <div class="text">
                        <h3><?php echo $value[1]; ?></h3>
                        <span><?php echo $value[6]; ?> Km</span>
                      </div>
                      </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <!-- </div> -->
      <div class="desc" id="alam">
        <div class="row">
          <?php
          foreach ($alam1 as $value) {
          ?>
            <div class="col-md-3 ftco-animate" style="margin-bottom: 13px;">
              <div class="card">
                <span class="ml-2"><?= $value[1] ?></span>
                <div class="project-destination">
                  <?php if ($value[2] == 'Tidak ada') { ?>
                    <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/no.jpg');">
                    <?php } else { ?>
                      <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/<?php echo $value[1]; ?><?php echo $value[2]; ?>');">
                      <?php } ?>
                      <div class="text">
                        <h3><?php echo $value[1]; ?></h3>
                        <span><?php echo $value[6]; ?> Km</span>
                      </div>
                      </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="desc" id="budaya">
        <div class="row">
          <?php
          foreach ($budaya1 as $value) {
          ?>
            <div class="col-md-3 ftco-animate" style="margin-bottom: 13px;">
              <div class="card">
                <span class="ml-2"><?= $value[1] ?></span>
                <div class="project-destination">
                  <?php if ($value[2] == 'Tidak ada') { ?>
                    <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/no.jpg');">
                    <?php } else { ?>
                      <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/<?php echo $value[1]; ?><?php echo $value[2]; ?>');">
                      <?php } ?>
                      <div class="text">
                        <h3><?php echo $value[1]; ?></h3>
                        <span><?php echo $value[6]; ?> Km</span>
                      </div>
                      </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="desc" id="kuliner">
        <div class="row">
          <?php
          foreach ($kuliner1 as $value) {
          ?>
            <div class="col-md-3 ftco-animate" style="margin-bottom: 13px;">
              <div class="card">
                <span class="ml-2"><?= $value[1] ?></span>
                <div class="project-destination">
                  <?php if ($value[2] == 'Tidak ada') { ?>
                    <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/no.jpg');">
                    <?php } else { ?>
                      <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/<?php echo $value[1]; ?><?php echo $value[2]; ?>');">
                      <?php } ?>
                      <div class="text">
                        <h3><?php echo $value[1]; ?></h3>
                        <span><?php echo $value[6]; ?> Km</span>
                      </div>
                      </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="desc" id="religi">
        <div class="row">
          <?php
          foreach ($religi1 as $value) {
          ?>
            <div class="col-md-3 ftco-animate" style="margin-bottom: 13px;">
              <div class="card">
                <span class="ml-2"><?= $value[1] ?></span>
                <div class="project-destination">
                  <?php if ($value[2] == 'Tidak ada') { ?>
                    <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/no.jpg');">
                    <?php } else { ?>
                      <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/<?php echo $value[1]; ?><?php echo $value[2]; ?>');">
                      <?php } ?>
                      <div class="text">
                        <h3><?php echo $value[1]; ?></h3>
                        <span><?php echo $value[6]; ?> Km</span>
                      </div>
                      </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="desc" id="belanja">
        <div class="row">
          <?php
          foreach ($belanja1 as $value) {
          ?>
            <div class="col-md-3 ftco-animate" style="margin-bottom: 13px;">
              <div class="card">
                <span class="ml-2"><?= $value[1] ?></span>
                <div class="project-destination">
                  <?php if ($value[2] == 'Tidak ada') { ?>
                    <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/no.jpg');">
                    <?php } else { ?>
                      <a href="profil.php?id=<?php echo $value[0]; ?>" class="img" style="background-image: url('upload/<?php echo $value[1]; ?><?php echo $value[2]; ?>');">
                      <?php } ?>
                      <div class="text">
                        <h3><?php echo $value[1]; ?></h3>
                        <span><?php echo $value[6]; ?> Km</span>
                      </div>
                      </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

      <div class="container-flu" style="background-color: #fff; text-align: center;">
        <a href="koordinat.php" class="btn btn-primary mt-3">Atur Koordinat</a>
      </div>
  </section>

  <!-- Footer -->
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
      </div>
    </div>
  </div>


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

  <script src="https://kit.fontawesome.com/e29ea9b691.js" crossorigin="anonymous"></script>
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