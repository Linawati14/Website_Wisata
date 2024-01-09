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

    /* 
    p {
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
          <a class="nav-link" style="margin-right: 30px;" href="home.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-right: 30px;" href="profil-kp.php">PROFILE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="margin-right: 30px;" href="map.php">MAP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="margin-right: 30px; color: orange;" href="informasi.php">INFORMASI</a>
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

  <div class="container mt-5">
    <h2 style="text-align: center;">Informasi Kulon Progo</h2>
  </div>

  <div class="row mt-5 mb-5" style="margin-left: 10px;">
    <?php
    include 'koneksi.php';
    // Assume $mysqli is your database connection
    $query = "SELECT * FROM tb_informasi";
    $result = $connect->query($query);

    while ($row = $result->fetch_assoc()) {
    ?>
      <div class="col-md-3">
        <div class="card shadow" style="width: 18rem;">
          <img style="width: 100%; height: 200px;" class="card-img-top" src="./upload/<?php echo $row['foto']; ?>" alt="<?php echo $row['foto']; ?>">
          <div class="card-body d-flex flex-column">
            <strong>
              <p class="card-title text-center"><?php echo $row['nama_informasi']; ?></p>
            </strong>
            <p class="mx-auto"><?= $row['tanggal_upload'] ?></p>
            <p class="card-text text-justify"><?php echo $row['deskripsi']; ?></p>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>

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
  </div>

  <!-- Include Bootstrap JS (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>