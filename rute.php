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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">

  <script type="text/javascript" src="j/jquery.1.8.3.min.js"></script>
  <script type="text/javascript" src="j/bootstrap.js"></script>
  <script type="text/javascript" src="j/jquery-scrolltofixed.js"></script>
  <script type="text/javascript" src="j/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="j/jquery.isotope.js"></script>
  <script type="text/javascript" src="j/wow.js"></script>
  <script type="text/javascript" src="j/classie.js"></script>
  <script type="text/javascript" src="j/magnific-popup.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCjviEPPRZvBG-PZnoFQ2JhVyTIlfXS4k"></script>


  <?php
  session_start();
  if (!empty($_SESSION['lat']) || isset($_SESSION['lat'])) {
  } else {
    header("location:index.php");
  }
  include "koneksi.php";
  $id = $_GET['id'];
  $query_mysql =  mysqli_query($connect, "SELECT * FROM tb_wisata where id_wisata = '$id'") or die(mysqli_error($connect));

  ?>

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

</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand bg-transparent" href="#">
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
          <a class="nav-link" style="margin-right: 80px;" href="logout-pengguna.php">
            <i class="fal fa fa-sign-out-alt fa-lg" style="color: #000000;"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <section class="main-section alabaster" style="min-height: 520px;">
    <?php while ($data = mysqli_fetch_array($query_mysql)) { ?>
      <div class="container wow fadeInUp delay-04s" align="center">

        <style>
          #right-panel {
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
          }

          #right-panel select,
          #right-panel input {
            font-size: 15px;
          }

          #right-panel select {
            width: 100%;
          }

          #right-panel i {
            font-size: 12px;
          }

          #map {
            height: 500px;
            float: left;
            width: 63%;
          }

          #right-panel {
            float: right;
            width: 34%;
            height: 500px;
            overflow: auto;
          }

          .panel {
            height: 500px;
            overflow: auto;
          }
        </style>

        <?php
        if (isset($_POST['id_wisata'])) {
          $id_wisata = $_POST['id_wisata'];
          $query = "SELECT latitude, longitude FROM tb_wisata WHERE id_wisata = $id_wisata";
          $result = mysqli_query($connect, $query);

          if ($result) {
            $data = mysqli_fetch_assoc($result);
            echo json_encode($data);
          } else {
            // Handle the error
            echo json_encode(array('error' => 'Unable to fetch data.'));
          }
        }
        ?>

        <div style="margin-top: 140px;" class="clearfix" style="background: white;">
          <div id="map" style="height: 400px;"></div>
          <div id="right-panel">
            <p>
              Total Jarak: <span id="total"></span><br />
              Node Terdekat: <span id="terdekat"></span><br />
              Destinasi Wisata : <span id="wisata"><?= $data['nama'] ?></span>
            </p>
          </div>
        </div>
        <p class="help-block">Geser marker atau garis untuk mengubah rute.</p>

        <script>
          var default_lat = <?php echo $data['latitude']; ?>;
          var default_lng = <?php echo $data['longitude']; ?>;
          var default_zoom = 16;

          $(function() {
            initMap();
          })

          var markerArray = [];

          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: {
                lat: default_lat,
                lng: default_lng
              }
            });

            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer({
              draggable: true,
              map: map,
              panel: document.getElementById('right-panel')
            });

            var stepDisplay = new google.maps.InfoWindow;

            directionsDisplay.addListener('directions_changed', function() {
              computeTotalDistance(directionsDisplay.getDirections());
              for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(null);
              }
              showSteps(directionsDisplay.getDirections(), markerArray, stepDisplay, map);
            });

            var defaultLocation = {
              lat: default_lat,
              lng: default_lng
            };

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                var userLocation = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };
                calculateAndDisplayRoute(userLocation, defaultLocation, directionsService, directionsDisplay, stepDisplay, map);
              }, function() {
                calculateAndDisplayRoute(defaultLocation, defaultLocation, directionsService, directionsDisplay, stepDisplay, map);
              });
            } else {
              calculateAndDisplayRoute(defaultLocation, defaultLocation, directionsService, directionsDisplay, stepDisplay, map);
            }
          }

          function calculateAndDisplayRoute(start, end, directionsService, directionsDisplay, stepDisplay, map) {
            directionsService.route({
              origin: start,
              destination: end,
              travelMode: 'DRIVING'
            }, function(response, status) {
              if (status === 'OK') {
                directionsDisplay.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
          }

          function computeTotalDistance(result) {
            var totalDistance = 0;
            var myRoute = result.routes[0].legs[0];
            for (var i = 0; i < myRoute.steps.length; i++) {
              totalDistance += myRoute.steps[i].distance.value;
            }
            document.getElementById('total').innerHTML = (totalDistance / 1000).toFixed(2) + ' km';
            findNearestNode(result);
          }

          function findNearestNode(result) {
            var myRoute = result.routes[0].legs[0];
            var nearestNode = myRoute.end_address;
            document.getElementById('terdekat').innerHTML = nearestNode;
          }
        </script>

      </div>
      </div>
  </section>
<?php } ?>


<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>