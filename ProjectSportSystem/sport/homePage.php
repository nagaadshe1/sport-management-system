<?php
session_start();
if(isset($_SESSION['user_id'])){
  $visibility = true;
}else{
  $visibility = false;
}

require_once("config.php");

if(isset($_POST['event-1'])){
  $eventName = 'Marathon';
}
if(isset($_POST['event-2'])){
  $eventName = 'Football';
}
if(isset($_POST['event-3'])){
  $eventName = 'Basketball';
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['event-1']) || isset($_POST['event-2']) || isset($_POST['event-3'])){
  $sql = "UPDATE user_form SET event = '$eventName' WHERE id = '$user_id'";
  mysqli_query($conn, $sql);
}


$sql_Marathon = "SELECT * FROM user_form WHERE event = 'Marathon'";
$sql_Football = "SELECT * FROM user_form WHERE event = 'Football'";
$sql_Basketball = "SELECT * FROM user_form WHERE event = 'Basketball'";
$Marathon_result = $conn->query($sql_Marathon);
$Football_result = $conn->query($sql_Football);
$Basketball_result = $conn->query($sql_Basketball);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Sport Arena</title>
    <!-- custom css file -->
    <link rel="stylesheet" href="landing.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <!-- font awesome cdn file link  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <style>
    .profile {
        display: flex;
        /* align-items: center; */
    }

    .profile a {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        width: 40px;
        background-color: #bbb;
        border-radius: 50%;
        margin-right: 20px;
    }

    .icons {
        display: flex;
        align-items: center;
    }
    </style>
</head>

<body>

    <header class="header">
        <a href="#" class="logo">Sport<span>Arena</span></a>
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#event">Events</a>
            <a href="#about">About</a>
            <a href="#services" id="our-services-btn">Our Services</a>
            <a href="#contact">Contact</a>
        </nav>
        <div style="display: inline-block;">
            <?php if($visibility){ ?>
            <div class="profile" style="display: inline-block;">
                <a href="profile.php">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
            </div>
            <div class="logout" style="display: inline-block;">
                <a href="logout.php" class="btn1">Logout</a>
            </div>
            <?php }else{  ?>
            <div class="icons" style="display: inline-block;">
                <a href="login_form.php" class="btn1">Login</a>
                <a href="register_form.php" class="btn1">Sign Up</a>
            </div>
            <?php } ?>
        </div>
    </header>
    <!-- header section ends -->

    <!-- hero section starts -->

    <section class="hero" id="home">
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                    aria-current="true"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/landing1.jpeg" class="d-block w-100" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="image/landing2.jpg" class="d-block w-100" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="image/landing3.jpg" class="d-block w-100" alt="Image 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="hero-content">
            <h1>Welcome to SportArena</h1>
            <br><br>
        </div>
    </section>
    <!-- hero section ends -->

    <!-- page content -->

    <div id="fixed-block">

        <div id="search-container" class="w3-content">
            <div class="w3-container" id="search">
                <h3 id="event">Events</h3>
                <p>Choose the event that you prefer and get ready for win.</p>
            </div>

            <div id="search-bar" class="w3-row-padding">
                <div class="w3-col m3">
                    <label><i class="fa fa-calendar-o"></i> Date</label>
                    <input class="w3-input w3-border date" type="date" id="date1" min="2023-04-23">
                </div>
                <div class="w3-col m2">
                    <label><i class="fas fa-running"></i> Event</label>
                    <input class="w3-input w3-border" type="text" placeholder="Event Name">
                </div>
                <div class="w3-col m2">
                    <label><i class="fa fa-search"></i> Search</label>
                    <button class="w3-button w3-block w3-black">Search</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <form action="" method="post" name="event_form">
        <div class="w3-row-padding w3-padding-16">
            <div class="w3-third w3-margin-bottom">
                <img src="image/marathon.jpg" alt="first-event" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Marathon</h3>
                    <span class="event-date">Event Date: May 15, 2023</span>
                    <h6 class="w3-opacity">Free</h6>
                    <p>Be first</p>
                    <p>5 km</p>
                    <p class="w3-large"><i class="fas fa-running"></i> <i class="fas fa-cloud-sun"></i> <i
                            class="fas fa-globe-asia"></i></p>
                    <button class="w3-button w3-block w3-black w3-margin-bottom" name="event-1" <?php if ($Marathon_result->num_rows > 2 ) {

echo 'disabled';  
} else {
  echo  '';
} ?>>Choose Event</button>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <img src="image/football.jpg" alt="Football" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Football</h3>
                    <span class="event-date">Event Date: May 5, 2023</span>
                    <h6 class="w3-opacity">Football game</h6>
                    <p>Be the winner of the game.</p>
                    <p class="w3-large"><i class="fas fa-map-marked"></i> <i class="fas fa-sun"></i> <i
                            class="far fa-futbol"></i>
                    </p>
                    <button class="w3-button w3-block w3-black w3-margin-bottom" name="event-2" <?php if ($Football_result->num_rows > 2 ) {

echo'disabled';  
} else {
  echo '';
} ?>>Choose Event</button>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom">
                <img src="image/basketball.jpg" alt="Basketball" style="width:100%">
                <div class="w3-container w3-white">
                    <h3>Basketball</h3>
                    <span class="event-date">Event Date: May 4, 2023</span>
                    <h6 class="w3-opacity">Basketball game</h6>
                    <p>Be the best player</p>
                    <p class="w3-large"><i class="fas fa-map-marked"></i> <i class="fas fa-sun"></i> <i
                            class="fas fa-basketball-ball"></i></p>
                    <button class="w3-button w3-block w3-black w3-margin-bottom" name="event-3" <?php if ( $Basketball_result->num_rows > 2) {

echo 'disabled';  
} else {
  echo '';
} ?>>Choose Event</button>
                </div>
            </div>
    </form>
    </div>
    <script src="script.js">


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <!-- About page -->

    <div class="about-section">
        <h1 id="about">About Us</h1>
        <p>We are here to help you to announce your event and to register that you liked.</p>
        <p>We believe you will conduct the event safely.</p>
    </div>

    <h2 style="text-align:center">Our Team</h2>
    <div class="row1">
        <div class="column">
            <div class="card">
                <img src="image/man1.jpg" alt="Jane" style="width:100%">
                <div class="container">
                    <h2>Jane Doe</h2>
                    <p class="title">CEO & Founder</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p>jane@example.com</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/man2.jpg" alt="Mike" style="width:100%">
                <div class="container">
                    <h2>Mike Ross</h2>
                    <p class="title">Art Director</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p>mike@example.com</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="image/man3.jpg" alt="John" style="width:100%">
                <div class="container">
                    <h2>John Doe</h2>
                    <p class="title">Designer</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p>john@example.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- our Services -->
    <h1 id="services" style="text-align: center;">Our Services</h1>
    <div class="services">
        <div class="service">
            <i class="fas fa-cogs"></i>
            <h3>Events</h3>
            <p>We create beautiful and functional events.</p>
        </div>
        <div class="service">
            <i class="fas fa-code"></i>
            <h3>Safety</h3>
            <p>We provide your security and always here to help you any time.</p>
        </div>
        <div class="service">
            <i class="fas fa-mobile-alt"></i>
            <h3>Arrangement</h3>
            <p>We arrange and help you optimise all the things.</p>
        </div>
    </div>


    <!-- contact us -->
    <div class="contact-section">
        <div class="contact-details">
            <h3 id="contact" style="text-align: center;">Contact Us</h3>
            <p style="text-align: center;">123 Main Street<br>City, State 12345<br>Phone: (123) 456-7890</p>
        </div>
        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Footer Page -->
    <footer>
        <p style="text-align: center;">Sport Arena, Copyright &copy; 2023</p>
    </footer>
</body>

</html>