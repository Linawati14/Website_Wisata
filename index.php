<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include Bootstrap CSS and Font Awesome CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .hero-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('images/p1a.png') no-repeat center fixed;
            background-size: cover;
        }

        .social-media {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-media a {
            margin: 0 10px;
            color: #333;
            font-size: 24px;
            transition: color 0.3s ease-in-out;
        }

        .social-media a:hover {
            color: #007bff;
            /* Change to your desired hover color */
        }

        .card-container {
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>

<body>

    <div class="hero-wrap">
        <section class="ftco-section contact-section">
            <div class="container" style="background-color: white;">
                <div class="block-9">
                    <div class="row">
                        <div class="col-md-8 col-lg-12 mx-auto">
                            <img src="./upload/LOGO_VAC_TRIP.png" class="mt-2 mb-3" style="margin-left: 40px;" alt="img">
                            <!-- Card with Login Form -->
                            <div class="card shadow card-container">
                                <div class="card-body" style="background-color: white;">
                                    <form class="contact-form" action="login-aksi2.php" method="post">
                                        <h3 class="card-title mt-3" style="text-align: center;">Login Pengguna</h3>
                                        <div class="form-group mt-4">
                                            <input type="text" class="form-control" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group" align="center">
                                            <input type="submit" value="Login" class="btn btn-primary py-2 px-4">
                                        </div>
                                    </form>
                                </div>

                                <!-- Card Footer with Social Media Icons -->
                                <div class="bg-white">
                                    <p style="text-align: center; font-size: 14px;">Login Dengan</p>
                                    <div class="social-media mb-5">
                                        <a href="#" class="fab fa-facebook"></a>
                                        <a href="#" class="fab fa-instagram"></a>
                                    </div>
                                </div>
                                <!-- End Card Footer -->
                            </div>
                            <!-- End Card with Login Form -->
                        </div>

                        <div class="col-md-6 d-flex">
                            <div id="map" class="bg-white"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>