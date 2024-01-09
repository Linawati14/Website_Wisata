<?php
include 'koneksi.php';
// session_start();
?>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
      border-radius: 9px;
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

  <?php
  $query_mysql =  mysqli_query($connect, "SELECT * FROM tb_wisata") or die(mysqli_error($connect));
  $countbelanja = 0;
  while ($data = mysqli_fetch_array($query_mysql)) {
    //save ke array
    if ($data['kategori'] == "belanja") {
      $belanja[$countbelanja] =
        [
          "id" => $data['id_wisata'],
          "nama" => $data['nama'],
          "alamat" => $data['alamat'],
          "lat" => $data['latitude'],
          "gambar" => $data['gambar'],
          "long" => $data['longitude'],
        ];
      $countbelanja = $countbelanja + 1;
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
    }
  }
  ?>

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
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand bg-transparent" href="#" style="margin-left: 25px;">
      <img src="./upload/LOGO_VAC_TRIP.png" alt="img">
    </a>
    <button class="navbar-toggler mx-auto mt-2 mb-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link" style="margin-right: 30px;" href="informasi.php">INFORMASI</a>
        </li>

        <?php
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
              <div class="jarak"><?php echo $data['kategori']; ?></div>
            </div>
            <button class="btn btn-outline-secondary btn-rute" style="color: black; margin-left: 5px;">
              <a href="rute.php?id=<?php echo $data['id_wisata'] ?>" style="color: black;">
                Rute
              </a>
            </button>
            <br>
            <span class="alamat-info"><?php echo $data['alamat']; ?></span>
            <br>
            <hr style="border: 1px solid grey;">
            <div class="row justify-content-center">
              <div class="col-sm-6">
                <form action="tambah-pemesanan-pelanggan.php" method="POST">
                  <div class="btn btn-warning btn-block" style="color: white; border: 1px solid black;"> <?= $data['harga'] ?> </div>
                  <input type="text" name="wisata" hidden value="<?= $data['nama'] ?>">
                  <input type="text" name="id_wisata" hidden value="<?= $data['id_wisata'] ?>">
                  <input type="text" name="harga" id="harga" value="<?= $data['harga'] ?>" hidden>
                  <input type="text" name="jumlah_tiket" id="jumlah_tiket" value="2" hidden>
                  <input type="text" name="total_pembayaran" hidden id="total_pemesanan" readonly>
                  <input type="datetime-local" hidden id="datetime" name="tanggal_kunjungan" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                  <?php
                  if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT id FROM tb_pengguna WHERE id = $user_id";
                    $result = $connect->query($query);

                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      $nama_lengkap = $row['id'];
                      echo '<input name="id" hidden value="' . $nama_lengkap . '">';
                    } else {
                      echo "Data pengguna tidak ditemukan.";
                    }
                  } else {
                    echo '<a class="nav-link" style="margin-right: 20px;" href="#">
                                <i class="fas fa-user"></i>Selamat datang
                            </a>';
                  }
                  ?>
              </div>
              <div class="col-sm-4">
                <!-- <button type="submit" class="btn btn-warning btn-block" style="color: white; border: 1px solid black;">Pesan Tiket</button> -->
                </form>
                <a href="pemesanan-tiket-final.php?id=<?= $data['id_wisata'] ?>" type="button" class="btn btn-warning btn-block" style="color: white; border: 1px solid black;">Pesan Tiket</a>
                <!-- <?php foreach ($belanja1 as $value) : ?>
                  <a href="pemesanan-tiket.php?id=<?php echo $value[0]; ?>" type="button" class="btn btn-warning btn-block" style="color: white; border: 1px solid black;">Pesan Tiket
                  </a>
                <?php endforeach; ?> -->

              </div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="container mt-2" style="background-color: white;">
            <h4 class="mt-5">Deskripsi Wisata</h4>
            <div class="gambar-container">
            </div>
            <p><?php echo $data['deskripsi']; ?></p>
            <hr style="border: 1px solid grey;">
            <div class="container mt-5">
              <div class="card p-3">
                <?php
                if (isset($_SESSION['user_id'])) {
                  $user_id = $_SESSION['user_id'];
                  $query = "SELECT nama_lengkap FROM tb_pengguna WHERE id = $user_id";
                  $result = $connect->query($query);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nama_lengkap = $row['nama_lengkap'];
                    echo '<h5 class="card-title">' . $nama_lengkap . '</h5>';
                  } else {
                    echo "Data pengguna tidak ditemukan.";
                  }
                } else {
                  echo '<a class="nav-link" style="margin-right: 20px;" href="#">
                                <i class="fas fa-user"></i>Selamat datang
                            </a>';
                }
                ?>
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
    <?php } ?>
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
      </div>
    </div>
  </div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

  <script>
    // Get references to the input fields
    var hargaInput = document.getElementById('harga');
    var jumlahTiketInput = document.getElementById('jumlah_tiket');
    var totalPemesananInput = document.getElementById('total_pemesanan');

    // Calculate and update the result when the page loads
    updateTotalPemesanan();

    // Add event listeners to recalculate when inputs change
    hargaInput.addEventListener('input', updateTotalPemesanan);
    jumlahTiketInput.addEventListener('input', updateTotalPemesanan);

    // Function to calculate and update the result
    function updateTotalPemesanan() {
      var harga = parseFloat(hargaInput.value) || 0;
      var jumlahTiket = parseInt(jumlahTiketInput.value) || 0;

      // Perform the multiplication
      var totalPemesanan = harga * jumlahTiket;

      // Display the result in the total_pemesanan input field
      totalPemesananInput.value = totalPemesanan.toFixed(2);
    }
  </script>

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
  <!-- Include Bootstrap JS (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>