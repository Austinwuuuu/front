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

  <title>課程查詢</title>

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
<style>
  table{
    color: white;
    text-align:center;

  }
  th,td{
    border-width:1px;
    height: 45px;
    width:100px;
  }
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">NUK<span>.</span></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="home.php">首頁</a></li>
          <li><a class="nav-link scrollto" href="apply1.php">請假申請</a></li>
          <li><a class="nav-link scrollto " href="record.php">請假紀錄</a></li>

          <li><a class="nav-link scrollto" href="logoutDB.php">登出</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="mypage.php"><i class="ri-user-line ri-3x"></i></a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
    <CENTER>
        <?php
            require("DBMSconnect.php");
            $list=array("星期一"=>array(1=>"","","","","","","","","","","","",""),
            "星期二"=>array(1=>"","","","","","","","","","","","",""),
            "星期三"=>array(1=>"","","","","","","","","","","","",""),
            "星期四"=>array(1=>"","","","","","","","","","","","",""),
            "星期五"=>array(1=>"","","","","","","","","","","","",""),);
            $SQL="SELECT cNum FROM fillin WHERE sNum='$sNum'";
            $SQL2="SELECT * FROM class WHERE cNum IN ($SQL)";
            $result=mysqli_query($link, $SQL2);
                echo "<table border=1>";
                echo "<thead><td></td><td>星期一</td><td>星期二</td><td>星期三</td><td>星期四</td><td>星期五</td></thead>";
                while($row=mysqli_fetch_assoc($result)){
                    $week=$row['week'];
                    $lesson=$row['lesson'];
                    $cName=$row['cName'];
                    if($week==1){
                      $list["星期一"][$lesson]=$cName;
                    }
                    if($week==2){
                      $list["星期二"][$lesson]=$cName;
                    }
                    if($week==3){
                      $list["星期三"][$lesson]=$cName;
                    }
                    if($week==4){
                      $list["星期四"][$lesson]=$cName;
                    }
                    if($week==5){
                      $list["星期五"][$lesson]=$cName;
                    }
                  }

                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>第一節</td>";
                    echo "<td>".$list['星期一'][1]."</td><td>".$list['星期二'][1]."</td><td>".$list['星期三'][1]."</td><td>".$list['星期四'][1]."</td><td>".$list['星期五'][1]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第二節</td>";
                    echo "<td>".$list['星期一'][2]."</td><td>".$list['星期二'][2]."</td><td>".$list['星期三'][2]."</td><td>".$list['星期四'][2]."</td><td>".$list['星期五'][2]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第三節</td>";
                    echo "<td>".$list['星期一'][3]."</td><td>".$list['星期二'][3]."</td><td>".$list['星期三'][3]."</td><td>".$list['星期四'][3]."</td><td>".$list['星期五'][3]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第四節</td>";
                    echo "<td>".$list['星期一'][4]."</td><td>".$list['星期二'][4]."</td><td>".$list['星期三'][4]."</td><td>".$list['星期四'][4]."</td><td>".$list['星期五'][4]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第五節</td>";
                    echo "<td>".$list['星期一'][5]."</td><td>".$list['星期二'][5]."</td><td>".$list['星期三'][5]."</td><td>".$list['星期四'][5]."</td><td>".$list['星期五'][5]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第六節</td>";
                    echo "<td>".$list['星期一'][6]."</td><td>".$list['星期二'][6]."</td><td>".$list['星期三'][6]."</td><td>".$list['星期四'][6]."</td><td>".$list['星期五'][6]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第七節</td>";
                    echo "<td>".$list['星期一'][7]."</td><td>".$list['星期二'][7]."</td><td>".$list['星期三'][7]."</td><td>".$list['星期四'][7]."</td><td>".$list['星期五'][7]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第八節</td>";
                    echo "<td>".$list['星期一'][8]."</td><td>".$list['星期二'][8]."</td><td>".$list['星期三'][8]."</td><td>".$list['星期四'][8]."</td><td>".$list['星期五'][8]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第九節</td>";
                    echo "<td>".$list['星期一'][9]."</td><td>".$list['星期二'][9]."</td><td>".$list['星期三'][9]."</td><td>".$list['星期四'][9]."</td><td>".$list['星期五'][9]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第十節</td>";
                    echo "<td>".$list['星期一'][10]."</td><td>".$list['星期二'][10]."</td><td>".$list['星期三'][10]."</td><td>".$list['星期四'][10]."</td><td>".$list['星期五'][10]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第十一節</td>";
                    echo "<td>".$list['星期一'][11]."</td><td>".$list['星期二'][11]."</td><td>".$list['星期三'][11]."</td><td>".$list['星期四'][11]."</td><td>".$list['星期五'][11]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第十二節</td>";
                    echo "<td>".$list['星期一'][12]."</td><td>".$list['星期二'][12]."</td><td>".$list['星期三'][12]."</td><td>".$list['星期四'][12]."</td><td>".$list['星期五'][12]."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>第十三節</td>";
                    echo "<td>".$list['星期一'][13]."</td><td>".$list['星期二'][13]."</td><td>".$list['星期三'][13]."</td><td>".$list['星期四'][13]."</td><td>".$list['星期五'][13]."</td>";
                    echo "</tr>";



/*                     echo "<td>".$row["startDate"]."</td>
                    <td>".$row["endDate"]."</td>
                    <td>".$row["type"]."</td>
                    <td>".$row["reason"]."</td>
                    <td>".$row["lesson"]."</td>
                    <td>".$row["certified"]."</td>
                    <td>".$row["status"]."</td>
                    <td class='main'><a href='updateImformation.php?pNumber=".$row["playerNumber"]."&dep=".$row["department"]."&name=".$row["uName"]."'>修改</a></td>";
                    echo "</tr>"; */
                    echo "</tbody>";
                
                echo "</table>";
            

        ?>

        </CENTER>
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

</body>

</html>