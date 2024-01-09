<?php include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Pesan Tiket</title>

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
                    <a class="nav-link" style="margin-right: 80px;" href="#">
                        <i class="fal fa fa-sign-out-alt fa-lg" style="color: #000000;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    // Ambil id wisata dari parameter URL
    $id_wisata = $_GET['id']; // Sesuaikan dengan parameter yang Anda gunakan

    // Query untuk mengambil data harga dari tb_wisata berdasarkan id_wisata
    $query_harga = "SELECT harga FROM tb_wisata WHERE id_wisata = $id_wisata";
    $result_harga = $connect->query($query_harga);

    // Periksa apakah query berhasil dieksekusi
    if ($result_harga) {
        $data_harga = $result_harga->fetch_assoc();
        $harga_tiket = $data_harga['harga'];
    } else {
        echo "Error: " . $connect->error;
    }

    // Ingat untuk menutup koneksi database setelah selesai menggunakannya
    $connect->close();
    ?>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="height: 380px;">
                    <div class="card-body">
                        <h3 class="card-title mb-5" style="text-align: center;">Tambah Pesanan</h3>
                        <form>
                            <div class="form-group">
                                <label for="">Tanggal Kunjungan :</label>
                                <input type="datetime-local" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_tiket">Jumlah Tiket : </label>
                                <input type="text" class="form-control" id="jumlah_tiket" placeholder="jumlah">
                            </div>
                            <div class="form-group">
                                <strong>
                                    <p>Harga Tiket : Rp. <?= $harga_tiket ?></p>
                                </strong>
                            </div>
                            <div class="form-group">
                                <strong>
                                    <p id="total_pesanan">Total Pesanan : Rp. 0</p>
                                </strong>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="height: 380px;">
                    <div class="card-body">
                        <h3 class="card-title mb-5" style="text-align: center;">Metode Pembayaran</h3>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Dana" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Gopay" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Shopee Pay" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Transfer Bank" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" id="success" class="btn btn-warning btn-block mx-auto mt-4" style="width: 30%; color: white;">Konfirmasi</button>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include SweetAlert2 CSS -->

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen-elemen yang dibutuhkan
            var inputJumlahTiket = document.querySelector('#jumlah_tiket');
            var hargaTiket = <?= $harga_tiket ?>; // Anda sudah mendapatkan harga_tiket dari PHP

            // Tambahkan event listener ke input jumlah tiket
            inputJumlahTiket.addEventListener('input', function() {
                // Ambil nilai dari input jumlah tiket
                var jumlahTiket = parseInt(inputJumlahTiket.value);

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(jumlahTiket)) {
                    // Hitung total pesanan
                    var totalPesanan = jumlahTiket * hargaTiket;

                    // Update teks pada elemen yang menampilkan total pesanan
                    document.querySelector('#total_pesanan').innerHTML = 'Total Pesanan : Rp. ' + totalPesanan;
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add a click event listener to the "Konfirmasi" button
            document.getElementById('success').addEventListener('click', function() {
                // Show SweetAlert2 success popup
                Swal.fire({
                    icon: 'success',
                    title: 'Pesanan Berhasil',
                    text: 'Tiketmu Berhasil dipesan',
                });
            });
        });
    </script>

</body>

</html>