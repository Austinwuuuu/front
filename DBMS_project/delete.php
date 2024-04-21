<?php
session_start();
require("DBMSconnect.php");
$sNum=$_SESSION["sNum"];
$startDate=$_GET["startDate"];
$endDate=$_GET["endDate"];
$lesson=$_GET["lesson"];


$SQL="DELETE  FROM AskForLeave WHERE sNum='$sNum' AND startDate='$startDate' AND endDate='$endDate' AND lesson='$lesson'";
if(mysqli_query($link, $SQL)){
    echo "<script type='text/javascript'>";
    echo "alert('刪除成功')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=record.php'>";
}else{
    echo "<sscript type='text/javascript'>";
    echo "alert('刪除失敗')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=record.php'>";
}

?>