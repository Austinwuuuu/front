<?php
session_start();

$link=@mysqli_connect(
    'localhost',
    'A1093358',
    'A1093358',
    'A1093358');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>高雄大學學生請假系統</title>

  <link href="image/logosmall.ico" rel="icon">
  <!-- <link href="image/logosmall.ico" rel="apple-touch-icon"> -->


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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1><font size="35">歡迎來到高雄大學請假系統</font></h1>
          <h2>登入</h2><br><br>
          <form id="contactForm" class=alpha data-sb-form-api-token="API_TOKEN" action="" method="post">
                <!-- Name input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="name" type="text" name="sNum" placeholder="Enter your student number..." data-sb-validations="required" />
                    <label for="studentnumber">Student Number</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">A Student number is required.</div>
                </div>
                <!-- Email address input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="password" name="pwd" placeholder="Enter your password" data-sb-validations="required,email" />
                    <label for="password">Password</label>
                    <div class="invalid-feedback" data-sb-feedback="email:required">Password is required.</div>
                </div>
                <!-- Submit Button-->
                <div class="d-grid"><button type="submit">Submit</button></div><br>
          </form>
        </div>
      </div>

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php
    if(isset($_POST["sNum"])){
        if($_POST["sNum"]!=null){
            $sNum=$_POST["sNum"];
            $pwd=$_POST["pwd"];


            $SQL="SELECT * FROM student WHERE sNum='$sNum' AND pwd='$pwd'";

            $result=mysqli_query($link,$SQL);
            $row=mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)==1){
                $_SESSION["login"]="Yes";
                $_SESSION["sNum"]=$sNum;
                header('Location: home.php');          
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('帳號密碼錯誤')";
                echo "</script>";
            }
        }
        else{
          echo "<script type='text/javascript'>";
          echo "alert('你未輸入帳號密碼')";
          echo "</script>";
        }
    }
    ?>
</body>

</html>