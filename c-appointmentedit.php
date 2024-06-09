<?php
        // include database connection file 
        include_once("config.php");
        
        // Check if form is submitted for user update, then redirect to homepage after update
        if(isset($_POST['update'])){
            $id = $_POST['ID'];
            $date = $_POST['date'];
            $stime = $_POST['startTime'];
            $etime = $_POST['endTime'];
            $office = $_POST['officeName'];
            $desc = $_POST['description'];
            
            // update user data
            $result = mysqli_query($conn, "UPDATE appointment SET date='$date', startTime='$stime', endTime='$etime', officeName = '$office', description = '$desc' WHERE appointmentID=$id");
            
            // Redirect to homepage to display updated user in list 
            header("Location: appointmentUser.php");
        }

        // Display selected user data based on id
        // Getting id from url
        $id = $_GET['ID'];

        // Fetech user data based on id
        $result = mysqli_query($conn, "SELECT * FROM appointment WHERE appointmentID=$id");

        while($appoinment = mysqli_fetch_array($result)) {
            $date = $appoinment['date'];
            $stime = $appoinment['startTime'];
            $etime = $appoinment['endTime'];
            $office = $appoinment['officeName'];
            $desc = $appoinment['description'];
        }

    ?>

<html> 
<head>
    <title>Edit Appoinment Data</title>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Appointments</title>


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
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
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


     <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="assets/img/polisi.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/tesla.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/about2.jpg" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Edit Appointment</h3>
        <form name="update" method="post" action="c-appointmentedit.php">
        <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" name="date" id="date" value=<?php echo htmlspecialchars($date); ?>>
                            </div>
                            <div class="form-group">
                                <label for="startTime">Start Time:</label>
                                <input type="time" class="form-control" name="startTime" id="startTime" value=<?php echo htmlspecialchars($stime); ?>>
                            </div>
                            <div class="form-group">
                                <label for="endTime">End Time:</label>
                                <input type="time" class="form-control" name="endTime" id="endTime" value=<?php echo htmlspecialchars($etime);?>>
                            </div>
                            <div class="form-group">
                                <label for="officeName">Office Name:</label>
                                <tr>
                                    <td>
                                        <select name="officeName">
                                        <option>Bandung City Office</option>
                                        <option>Bogor City Office</option>
                                        <option>Central Jakarta Office</option>
                                        <option>East Bekasi Office</option>
                                        <option>North Cikarang Office</option>
                                        <option>South Tangerang Office</option>
                                        <option>Surabaya Office</option>
                                        <option>West Cikarang Office</option>
                                        <option>West Jakarta Office</option>
                                        <option>Yogyakarta Office</option>
                                        </select>
                                    </td>
                                </tr>
                            </div>
                            <input type="hidden" name="ID" value=<?php echo $_GET['ID'];?>
                            class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="4" cols="50"><?php echo $desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="update" value="update" >Update</button>
                                <button type="button" class="btn btn-default" onclick="location.href='appointmentUser.php'">Cancel</button>
                            </div>
    </form>
    </div>
        </div>
      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<footer id="footer">

<div class="footer-top">
<div class="container">
  <div class="row">

    <div class="col-lg-3 col-md-6 footer-contact">
      <h3>DMV Indonesia<span>.</span></h3>
      <p>
        Jababeka Education Park <br>
        West Java 17530<br>
        Indonesia <br><br>
        <strong>Phone:</strong> (021)89114933<br>
        <strong>Email:</strong> customersupport@dmv.id<br>
      </p>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="profileUser.php">Profile</a></li>
      </ul>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
      <h4>Our Services</h4>
      <ul>
        <li><i class="bx bx-chevron-right"></i> <a href="appointmentUser.php">Appointments</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="registrationUser.php">Vehicle Registrations</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="ticketpenaltyUser.php">Penalty Tickets</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="officeUser.php">Offices</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="transactionUser.php">Transactions</a></li>
      </ul>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
      <h4>Our Social Networks</h4>
      <p>Follow our social networks for more news and update.</p>
      <div class="social-links mt-3">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>

  </div>
</div>
</div>

<div class="container py-4">


</div>
</footer><!-- End Footer -->

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
</body>
</html>