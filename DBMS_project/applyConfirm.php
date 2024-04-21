<?php
session_start();
require("DBMSconnect.php");

$sNum=$_SESSION["sNum"];
$startDate=$_POST["startDate"];
$endDate=$_POST["endDate"];
$type=$_POST["type"];
$reason=$_POST["reason"];
$lesson=$_POST["lesson"];
$finalphoto="Photo".time().".jpg";
$a=0;
$check=false;
foreach($lesson as $v){
    $a=$a+1;
}
if($a!=0){
    foreach($lesson as $value){
        $SQL="INSERT INTO AskForLeave (sNum, startDate, endDate, type, reason, lesson, certified) VALUES ('$sNum','$startDate','$endDate','$type','$reason','$value', '$finalphoto')";    
        if(mysqli_query($link, $SQL)){
            $check=true;
        }
    }    
    if($check){
            echo "<script type='text/javascript'>";
            echo "alert('申請成功');";
            echo "</script>";
            echo $value;
            echo "<meta http-equiv='Refresh' content='0; url=apply1.php'>";
    }else{
            echo "<script type='text/javascript'>";
            echo "alert('該堂課已申請');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=apply1.php'>";
    }

}else{
    echo "<script type='text/javascript'>";
    echo "alert('請選擇要請假的課堂');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=apply1.php'>";
}

  
    


?>