<?php session_start()?>
<?php include 'navbar.php';?>
<?php include 'header.php';?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!--welcome-->
    <section class="welcome" id="home">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="welcome_title">
                        <h1>Welcome to our <br>
                            bus booking site</h1>
                        <p>A unique online bus booking site.<br>
                            If you want to book a bus at a cheap cost<br>
                            and fast rate,you've come
                            to the right place.
                        </p>

                        <div class="button"><a href="http://localhost/green/book.php">
                                <button type="button" name=" book_button" class=" btn btn-primary btn-lg">
                                    Book
                                </button>
                            </a></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="welcome_home">
                        <img src="assets/images/green_bus.png" class="img-fluid" alt="greenbus image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end welcome-->

    <!--content-->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="box-1">
                        <img src="assets/images/image1.png" alt="selected box">
                        <h2>Easy to book</h2>
                        <p>Booking the bus is easy</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-2">
                        <img src="assets/images/convenience.png" alt="24hour-logo">
                        <h2>Convenient</h2>
                        <p>Can book at any place any time.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="box-3">
                        <img src="assets/images/image2.png" alt="customer-logo">
                        <h2>Superior customer service</h2>
                        <p>Great customer service from<br>
                            8am to 10pm via phone or email.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-4">
                        <img src="assets/images/payments.png" alt="phone-payment">
                        <h2>Efficient</h2>
                        <p>Booking is instant via mpesa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end content-->

    <!--details-->
    <section class="details">
        <div class="container">
            <div>
                <h3>Numbers are growing:</h3>
            </div>
            <div class="row">
                <div class="col-sm mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p>Customers</p>
                            <p>1000+</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p>Busses</p>
                            <p>400+</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <p>Tickets</p>
                            <p>500+</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end details-->

    <!--footer-->
    <section class="footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact_section">
                        <div class="card">
                            <img src="assets/images/twitter.png" alt="twitter-logo">
                        </div>
                        <div class="card">
                            <img src="assets/images/fb.png" alt="fb-logo">
                        </div>
                        <div class="card">
                            <img src="assets/images/ig.png" alt="ig-logo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="left_col">
                        <a href="contact.html" class="link-dark">
                            <p>Contact us</p>
                        </a>
                        <a href="about.html" class="link-dark">
                            <p>About</p>
                        </a>

                    </div>
                </div>
                <div class="col-6">
                    <div class="right_col">
                        <a href="#" class="link-dark">
                            <p>Terms & conditions</p>
                        </a>
                        <a href="#" class="link-dark">
                            <p>FAQ</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--end footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- PWA Install -->
    <script>
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("serviceWorker.js").then(function() {
            console.log("Service Worker Registered");
        });
    }
    </script>

    <!-- import the webpage's javascript file -->
    <script src="/script.js" defer></script>

</body>

</html>