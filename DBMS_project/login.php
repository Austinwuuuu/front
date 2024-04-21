<?php
session_start();

$link=@mysqli_connect(
    'localhost',
    'root',
    'root',
    'A1093358');

/* if(isset($_COOKIE["account"])){
    $cookieID=$_COOKIE["account"];
    echo "welcome".$cookieID."再度光臨my縫";
}else{
    echo "歡迎光臨my縫";
} */
?>

<html>
<style type="text/css">
    body {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }
    #container{
        height:1000px;
        margin-top:0px;
        background: #AFAFAF; 
/*         background: -webkit-linear-gradient(to right, #46A3FF, #FF5151); 
        background: linear-gradient(to right,#46A3FF, #FF5151); */ 
    }
    input[type=text]{
        width: 100%;
        height: 40px;
        padding: 12px 20px;
        margin: 5px 0;
        box-sizing: border-box;
    }
    input[type=password]{
        width: 100%;
        height: 40px;
        padding: 12px 20px;
        margin: 5px 0;
        box-sizing: border-box;
    }
    table{
        width: 30%;
    }
    .forget_pass{
        position:absolute;
        top:65%;
        left:46%;
        z-index:10;
    }
    #IMG_1{
        position:absolute;
        top:32%;
        left:29%;
        width:600px;
        height:400px;
        background-color:#f2bf42;
        z-index:1;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 40px;
    }
    .post{
        position:absolute;
        top:37%;
        left:5%;
        width:90%;
        height:500px;
        z-index:10;
    }
    </style>
    <body>
        <div id="container">
            <CENTER>
            <BR><BR><BR>
            <p align="center"><img src="logo.png" width="500" height="75"></p>
            <H2><font color="black" size="5px"><span style="font-family:Sans-serif; font-size:30px;">學生請假系統登入</span></font></H2>
            <BR><BR><BR>
            <img scr="IMG_1" id="IMG_1" width="170" height="89" alt="">
            <div class="post">
            <form name="login" action="" method="post">
            <TABLE>
                <tr><td align="center" valign="center">
                    <tr>
                        <th align="left"><font color="wHITE"><span style="font-family:Sans-serif; font-size:10px;">學號</font></th>
                    </tr>
                    <tr>
                        <th><input type="text" name="account" size="20" placeholder="輸入學號"></th>
                    </tr>
                    <tr>
                        <th align="left"><font color="wHITE"><span style="font-family:Sans-serif; font-size:10px;">密碼</font></th>
                    </tr>
                    <tr>
                        <th><input type="password" name="password" size="20" maxlength=20 placeholder="輸入密碼"></center></th>
                    </tr>
                
                </td></tr>
            </table><br>
            <input type="submit" name="login" value="LOGIN" style="color:white;font-size:18px;width:30%;height:43px;background-color:	#00CACA;border:	#00CACA"><Br>
            </div>
            </CENTER>
            <div class="forget_pass">
                <font color="white"><a href="forget.php">Forget pasword?</a></font>
            </div>
        </form>
        </div>

    <?php
    echo $_POST["account"];
    if(isset($_POST["account"])){
        if($_POST["account"]!=null){
            $account=$_POST["account"];
            $password=$_POST["password"];
            echo $account;
            echo $password;

            $SQL="SELECT * FROM student WHERE sNum='$account' AND pwd='$password'";

            $result=mysqli_query($link,$SQL);
            $row=mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result)==1){
                $_SESSION["login"]="Yes";
                setcookie("sNum", $account, time()+3600);
                header('Location: home.php');         
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('帳號密碼錯誤')";
                echo "</script>";
            }
            //echo $uId."<br/>";
            //echo $uPwd;
            //if($aID==$uId && $aPWD==$uPwd){
            //    $_SESSION["login"]="Yes";
            //    setcookie("account", $uId, time()+3600);
            //    header('Location: /index.php');
            //}
            //else{
            //    echo "帳號密碼錯誤";
            //}
        }
        else{
            echo "你未輸入帳號密碼";
        }
    }
    else{
        echo "welcome 請輸入帳號密碼";
    }
    ?>
    </body>
</html>
