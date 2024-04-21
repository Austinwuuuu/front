<html>
<?php
require("DB.php");

$hname=$_POST["name"];
$hcolor=$_POST["color"];
$breed=$_POST["breed"];
$owner=$_POST["owner"];
$hage=$_POST["age"];

//產生新檔案名稱
$finalphoto=time().".jpg";
$now=time();

//照片路徑加入資料庫
$SQL="INSERT INTO horse (hname, color, breed, owner_name, age, hpath, htime) VALUES ('$hname', '$hcolor', '$breed', '$owner', $hage, '$finalphoto', $now)";
$SQL2="SELECT * FROM owner WHERE oname='$owner'";
$result = mysqli_query($link,$SQL2);
$num = mysqli_num_rows($result);
//上傳檔案
if($num > 0){
    if(move_uploaded_file($_FILES['photo']['tmp_name'],"image/horse/".$finalphoto)){
        if(mysqli_query($link, $SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('新增成功');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=horse.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('新增失敗');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=horse.php'>";
        };
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('新增失敗');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=horse.php'>";
    }
}else{
    echo "<script type='text/javascript'>";
    echo "alert('馬場內沒有該名飼主');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=horse.php'>";
}
?>
</html>