<?php
session_start();
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
    }
    table.main {
    border-spacing: 0;
    width: 65%;
    }
    tr {
    text-align: center;
    }
    th {
    padding: 10px;
    }
    table.main tbody tr:nth-child(odd){
    background-color: #eee
    }
    
    td.main:hover {
    background-color: #E6FBFF;
    }
    table.main thead {
    background-color: #66B3FF;
    color: white;
    }
    table.main thead th:first-child {
    border-radius: 5px 0 0 0;
    border: 1px solid blue;
    }
    table.main thead th:last-child {
    border-radius: 0 5px 0 0;
    border-right: 1px solid blue;
    }
    table.main tbody tr:last-child td:first-child {
    border-radius: 0 0 0 5px;
    }

    table.main tbody tr:last-child td:last-child {
    border-radius: 0 0 5px 0;
    }
    </style>
    <body>
        <div id="container">
            <CENTER>
            <BR><BR><BR>
            <p align="center"><img src="logo.png" width="500" height="75"></p>
            <H2><font color="black" size="5px"><span style="font-family:Sans-serif; font-size:30px;">請假紀錄</span></font></H2>
            <BR><BR><BR>
            </CENTER>
            <?php
            require("DBMSconnect.php");
            $cookie=$_COOKIE["sNum"];
            $SQL="SELECT * FROM askforleave WHERE sNum='$cookie'";
            if($result=mysqli_query($link, $SQL)){
                echo "<table class='main'>";
                echo "<thead><td>startDate</td><td>endDate</td><td>type</td><td>reason</td><td>lesson</td><td>certified</td><td>status</td><td>update</td></thead>";
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>".$row["startDate"]."</td>
                    <td>".$row["endDate"]."</td>
                    <td>".$row["type"]."</td>
                    <td>".$row["reason"]."</td>
                    <td>".$row["lesson"]."</td>
                    <td>".$row["certified"]."</td>
                    <td>".$row["status"]."</td>
                    <td class='main'><a href='updateImformation.php?pNumber=".$row["playerNumber"]."&dep=".$row["department"]."&name=".$row["uName"]."'>修改</a></td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
                echo "</table>";
            }

            ?>
        </div>
    </body>
</html>
