<?php
session_start();
$sNum=$_SESSION["sNum"];
$startDate=$_GET["startDate"];
$endDate=$_GET["endDate"];
$lesson=$_GET["lesson"];
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
  <link href="image/logosmall.ico" rel="apple-touch-icon">


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
          <h1>請假修改</h1><br><br>
        </div>
      </div>
        <CENTER>
        <?php
            require("DBMSconnect.php");

        $SQL="SELECT * FROM AskForLeave WHERE startDate='$startDate' AND endDate='$endDate' AND sNum='$sNum' AND lesson='$lesson'";
        if($result=mysqli_query($link, $SQL)){
            while($row=mysqli_fetch_assoc($result)){
                $type=$_GET["type"];   
                $reason=$_GET["reason"];
                $certified=$_GET["certified"];
        
            }
        }
        ?>
        </br>
        <form action="updateConfirm.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="startDate" value="<?php echo $startDate;?>">
        <input type="hidden" name="endDate" value="<?php echo $endDate;?>">
        <input type="hidden" name="lesson" value="<?php echo $lesson;?>">
            <h3><font color='#ffffff'>請假類型</h3>
            <div>
            <select name="type" class="alpha" required>
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
            <br><br>
            <h3><font color='#ffffff'>請假事由</h3>
            <textarea class="alpha" name="reason" required>
            </textarea>
            <br><br>
            <h3><font color='#ffffff'>證明文件</h3>
            <label class="btn btn-dark">
            <input id="upload_img" style="display:none;" type="file" name="certified">
            <i class="fa fa-photo"></i> 上傳圖片
            </label>
            <br><br>
            <input type="submit" name="修改完成">
        </form>
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




