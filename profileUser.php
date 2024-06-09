<?php
session_start();

include_once("config.php");

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM register WHERE ID = $user_id");

if ($result->num_rows > 0) {
    // Output data of the user
    while($row = $result->fetch_assoc()) {
        $fname = $row["fName"];
        $lname = $row["lName"];
        $email = $row["email"];
        $phone = $row["phone"];
        $address = $row["address"];
        $id = $row["ID"];
    }
} else {
    echo "User not found";
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
		.container2 {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
    margin: 0 auto; /* Add this */
    padding: 0;
    text-align: center;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #333;
    max-width: 600px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    margin-top: 50px; /* Add this to give it some spacing from the top */
}


	</style>
    </head>
<body>
    <!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:customersupport@dmv.id">customersupport@dmv.id</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>(021)89114933</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://twitter.com/PDI_Perjuangan" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/PDIPerjuangan" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/fr_ysviel/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/muhammad-daffa-ananda-budi-15160425a/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">DMV<span>.</span>ID</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>Quick Access</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="appointmentUser.php">Appointments</a></li>
                  <li><a href="registrationUser.php">Vehicle Registrations</a></li>
                  <li><a href="ticketpenaltyUser.php">Penalty Tickets</a></li>
                  <li><a href="officeUser.php">Offices</a></li>
                  <li><a href="transactionUser.php">Transactions</a></li>
                  <li><a href="vehicleUser.php">Vehicles</a></li>
                </ul>
              </li>
              <li><a href="login.php">Log Out</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="profileUser.php">Profile</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <div class="container2">
		<h1>User Profile</h1>

		<p><strong>ID:</strong> <?php echo $id; ?></p>
		<p><strong>First Name:</strong> <?php echo $fname; ?></p>
		<p><strong>Last Name:</strong> <?php echo $lname; ?></p>
		<p><strong>Email:</strong> <?php echo $email; ?></p>
		<p><strong>Phone:</strong> <?php echo $phone; ?></p>
		<p><strong>Address:</strong> <?php echo $address; ?></p>
        <button class="btn btn-primary" onclick="redirectToIndex2()">Return Home</button>
            <script>
                function redirectToIndex2() {
                window.location.href = "index.html";
                }
            </script>
        <button class="btn btn-primary" onclick="redirectToIndex()">Edit Profile</button>
            <script>
                function redirectToIndex() {
                window.location.href = "profileEdit.php";
                }
            </script>
	</div>
</body>
</html>