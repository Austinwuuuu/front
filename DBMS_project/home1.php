
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
    .btn1{
        position:absolute;
        top:32%;
        left:3%;
        width:30%;
        height:60%;
        background-color:#f2bf42;
        z-index:1;
        font-size: 20px;
        color: PapayaWhip;
        text-align: center;
        border-radius: 40px;
        cursor: pointer;
    }
    .btn2{
        position:absolute;
        top:32%;
        left:35%;
        width:30%;
        height:60%;
        background-color:#f2bf42;
        z-index:1;
        font-size: 20px;
        color: PapayaWhip;
        text-align: center;
        border-radius: 40px;
        cursor: pointer;
    }
    .btn3{
        position:absolute;
        top:32%;
        left:67%;
        width:30%;
        height:60%;
        background-color:#f2bf42;
        z-index:1;
        font-size: 20px;
        color: PapayaWhip;
        text-align: center;
        border-radius: 40px;
        cursor: pointer;
    }
    .btn1:hover {
    /* :hover 代表滑鼠移到元素上時的狀態 */ 
    transform: scale(1.05);
    }

    .btn1:active {
    /* :active是滑鼠點擊元素的狀態 */
    transform: scale(1);
    box-shadow: inset 0 0 10px 1px rgba(0, 0, 0, .2);
    }
    .btn2:hover {
    /* :hover 代表滑鼠移到元素上時的狀態 */ 
    transform: scale(1.05);
    }

    .btn2:active {
    /* :active是滑鼠點擊元素的狀態 */
    transform: scale(1);
    box-shadow: inset 0 0 10px 1px rgba(0, 0, 0, .2);
    }
    .btn3:hover {
    /* :hover 代表滑鼠移到元素上時的狀態 */ 
    transform: scale(1.05);
    }

    .btn3:active {
    /* :active是滑鼠點擊元素的狀態 */
    transform: scale(1);
    box-shadow: inset 0 0 10px 1px rgba(0, 0, 0, .2);
    }
    #text1{
        position:absolute;
        top:44%;
        left:38%;
        font-size:50px;
        z-index:1;
        color:#FFFFFF;
    }
    #text2{
        position:absolute;
        top:44%;
        left:28%;
        font-size:50px;
        z-index:1;
        color:#FFFFFF;
    }
    #text3{
        position:absolute;
        top:44%;
        left:28%;
        font-size:50px;
        z-index:1;
        color:#FFFFFF;
    }
    </style>
    <body>
        <div id="container">
            <CENTER>
            <BR><BR><BR>
            <p align="center"><img src="logo.png" width="500" height="75"></p>
            <H2><font color="black" size="5px"><span style="font-family:Sans-serif; font-size:30px;">學生請假系統</span></font></H2>
            <BR><BR><BR>
            <div class="btn1"><div id="text1"><font face="Arial">請假</font></div></div>
            <div class="btn2"><div id="text2"><font face="Arial">課程資訊</font></div></div>
            <a href="record.php"><div class="btn3"><div id="text3"><font face="Arial">請假紀錄</font></div></div></a>
            </CENTER>
        </div>
    </body>
</html>
