<?php
session_start();
$sNum=$_SESSION["sNum"];
require("DBMSconnect.php");
$sNum=$_SESSION["sNum"];
$startDate=$_POST["startDate"];
$endDate=$_POST["endDate"];
$type=$_POST["type"];
$reason=$_POST["reason"];
$lesson=$_POST["lesson"];
if($_POST["certified"]!=NULL){
    $finalphoto="Photo".time().".jpg";
    $SQL="UPDATE AskForLeave SET type='$type', reason='$reason', certified='$finalphoto' WHERE sNum='$sNum' AND startDate='$startDate' AND endDate='$endDate' AND lesson='$lesson'";

    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('修改成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=record.php'>";
    }else{
        echo "<sscript type='text/javascript'>";
        echo "alert('修改失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=record.php'>";
    }
}else{
    $SQL="UPDATE AskForLeave SET type='$type', reason='$reason' WHERE sNum='$sNum' AND startDate='$startDate' AND endDate='$endDate' AND lesson='$lesson'";
    if(mysqli_query($link, $SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('修改成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=record.php'>";
    }else{
        echo "<sscript type='text/javascript'>";
        echo "alert('修改失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=record.php'>"; 
    }
}



?>
