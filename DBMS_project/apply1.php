<?php
session_start();
$sNum=$_SESSION["sNum"];
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

  <title>學生請假申請</title>

  <link href="image/logosmall.ico" rel="icon">
  <link href="image/logosmall.ico" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">



  <link href="assets/css/style.css?v=<?=time()?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">NUK<span>.</span></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="home.php">首頁</a></li>
          <li><a class="nav-link scrollto active" href="apply1.php">請假申請</a></li>
          <li><a class="nav-link scrollto " href="record.php">請假紀錄</a></li>

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
          <h1>學生請假系統</h1><br>
        </div>
      </div>
      <CENTER>
      <div class="alpha">
      <form action="apply2.php" method="post">
            <h3><font color='#ffffff'>開始日期</h3><input type="text" id="datepicker" name="startDate" required="required"></font><br><br>

            <h3><font color='#ffffff'>結束日期</h3><input type="text" id="datepicker2" name="endDate" required="required"></font><br><br>
            
            <?php
            if(strtotime($_POST["startDate"])>strtotime("$_POST[endDate]")){
                echo "<script type='text/javascript'>";
                echo "alert('開始日期要在結束日期之前ㄛ！');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=apply1.php'>";
            }
            
            ?>

            <h3><font color='#ffffff'>請假類型</h3>
            <div>
            <select name="type" required>
                <option value="">請選擇請假類別</option>
                <option value="事假">事假</option>
                <option value="病假">病假</option>
                <option value="喪假">喪假</option>
                <option value="產假">產假</option>
                <option value="陪產假">陪產假</option>
                <option value="疫苗假">疫苗假</option>
                <option value="公假">公假</option>
                <option value="婚假">婚假</option>
                <option value="防疫假">防疫假</option>
            </select>
            </div>
            <br>
            <div><button type="submit">Continue</button></div>
      </div>
      </CENTER>
      </form>
    </div>
</section>

 
</body>
</html>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
            var weekArray = new Array(7, 1, 2, 3, 4, 5, 6);
            var startweek = weekArray[new Date($_POST[startDate]).getDay()];
            var endweek = weekArray[new Date($_POST[endDate]).getDay()];
  </script>
</body>
</html>