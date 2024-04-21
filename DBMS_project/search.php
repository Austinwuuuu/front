<?php
session_start();
$sNum=$_SESSION["sNum"];
$search=$_POST["search"];
if(isset($_SESSION["login"])){
    if($_SESSION["login"]=="Yes"){
        
    }else{
        echo "非法登入";
        exit();
    }
}else{
    echo "非法登入系統";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>請假紀錄</title>

  <link href="image/logosmall.ico" rel="icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="assets/css/style.css?v=<?=time()?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">NUK<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="home.php">首頁</a></li>
          <li><a class="nav-link scrollto" href="apply1.php">請假申請</a></li>
          <li><a class="nav-link scrollto active" href="record.php">請假紀錄</a></li>
          <li><a class="nav-link scrollto" href="logoutDB.php">登出</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="lesson.php"><i class="ri-user-line ri-3x"></i></a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>高雄大學學生請假系統</h1><br><br>
        </div>
      </div>
        <CENTER>
        <form action="search.php" method="post">
          <div>
          <input type="text" placeholder="搜尋" name="search">
          </div>
          <br>
        </form>
        <?php
            require("DBMSconnect.php");
            $SQL="SELECT * FROM askforleave WHERE sNum='$sNum'";
            $SQL1="SELECT * FROM AskForLeave WHERE sNum='$sNum' AND (startDate LIKE '%$search%' OR endDate LIKE '%$search%' OR type LIKE '%$search%' OR reason LIKE '%$search%' OR lesson LIKE '%$search%' OR status LIKE '%$search%')";    
            if($result=mysqli_query($link, $SQL1)){
                echo "<table class='beta'>";
                echo "<thead align='center'><td>startDate</td><td></td><td>endDate</td><td></td><td>type</td><td></td><td>reason</td><td></td><td>lesson</td><td></td><td>certified</td><td></td><td>status</td><td>update</td><td>delete</td></thead>";
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td align='center'>".$row["startDate"]."</td>
                    <td></td>
                    <td align='center'>".$row["endDate"]."</td>
                    <td></td>
                    <td align='center'>".$row["type"]."</td>
                    <td></td>
                    <td align='center'>".$row["reason"]."</td>
                    <td></td>
                    <td align='center'>".$row["lesson"]."</td>
                    <td></td>
                    <td align='center'>".$row["certified"]."</td>
                    <td></td>
                    <td align='center'>".$row["status"]."</td>";
                    if($row["status"]=="Applied"){
                      echo "<td class='main' align='center'><a href='update.php?startDate=".$row["startDate"]."&endDate=".$row["endDate"]."&lesson=".$row["lesson"]."'>修改</a></td>";
                      echo "<td class='main' align='center'><a href='delete.php?startDate=".$row["startDate"]."&endDate=".$row["endDate"]."&lesson=".$row["lesson"]."'>刪除</a></td>";
                    }

                    echo "</tr>";
                }
                echo "</table>";
            }

        ?>
        </CENTER>
    </div>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>