<?php
session_start();
$sNum=$_SESSION["sNum"];
$type=$_POST["type"];
$timestamp = strtotime($_POST["startDate"]); 
$startDate = date("Y-m-d", $timestamp );
$timestamp1 = strtotime($_POST["endDate"]); 
$endDate = date("Y-m-d", $timestamp1 );

if(isset($_SESSION["login"])){
    if($_SESSION["login"]!="Yes"){
        echo "非法登入";
        exit();
    }
}else{
    echo "非法登入系統";
    exit();
}

if(strtotime($startDate)>strtotime($endDate)){
    echo "<script type='text/javascript'>";
    echo "alert('開始日期要在結束日期之前ㄛ！');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=apply1.php'>";
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
      <form action="applyConfirm.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="startDate" value="<?php echo $startDate;?>">
        <input type="hidden" name="endDate" value="<?php echo $endDate;?>">
        <input type="hidden" name="type" value="<?php echo $type;?>">
            <h3><font color='#ffffff'>請假節次</h3>
            
            <?php
            $sweek=(int)date("w", strtotime($startDate));
            $eweek=(int)date("w", strtotime($endDate));
            require("DBMSconnect.php");
            $SQL="SELECT cNum FROM fillin WHERE sNum='$sNum'";
            if($sweek<=$eweek){
                $SQL2="SELECT * FROM class WHERE week >= '$sweek' AND week <= '$eweek' AND cNum IN ($SQL)";
                if($result=mysqli_query($link, $SQL2)){
                    echo "<table class='alpha'>";
                    echo "<thead align='center'><td>課程名稱</td><td>節次</td><td>選取</td></thead>";
                    while($row=mysqli_fetch_assoc($result)){
                        $lesson=$row["lesson"];
                        echo "<tr>";
                        echo "<td align='center'>".$row["cName"]."</td><td align='center'>".$row["lesson"]."</td><td align='center'><input name='lesson[]' value='$lesson' type='checkbox'></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }else{
                $SQL2="SELECT * FROM class WHERE (week >= '$sweek' OR week <= '$eweek') AND cNum IN ($SQL)";
                if($result=mysqli_query($link, $SQL2)){
                    echo "<table class='alpha'>";
                    echo "<thead align='center'><td>課程名稱</td><td>節次</td><td>選取</td></thead>";
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td align='center'>".$row["cName"]."</td><td align='center'>".$row["lesson"]."</td><td align='center'><label style='display:block;'><input name='select' value='1' type='checkbox'></label></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            
            ?>
            <br>
            <h3><font color='#ffffff'>請假事由</h3>
            <textarea class="alpha" name="reason" placeholder="Enter your Reason" required>
            </textarea>
            <br><br>
            <h3><font color='#ffffff'>證明文件</h3>
            <input type="file" name="certified" accept="image/*">
            <br><br>
            <button type="submit">Continue</button>
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
</body>
</html>