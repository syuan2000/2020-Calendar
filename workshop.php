    <?php

    if(!session_start()) {
    header("Location: error.php");
    exit;
    }
    // in case the user come in before they login
    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
    if (!$loggedIn) {
        echo "<script>alert('You have not logged in yet');</script>";
        echo "<script>location.href='login.php';</script>";
        exit;
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>workshop</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <style>

            .header{
                display: block;
                text-align: center;
                overflow: hidden;
                white-space: nowrap; 
                margin-top:40px;
                margin-bottom: 40px;
            }

            .header > span {
                position: relative;
                display: inline-block;
                font-size: 40px;
                color: #575757;
            }

            .header > span:before,.header > span:after {
                content: "";
                position: absolute;
                top: 50%;
                width: 80%;
                height: 1px;
                background: #575757;
            }

            .header > span:before {
                right: 100%;
                margin-right: 15px;
            }

            .header > span:after {
                left: 100%;
                margin-left: 15px;
            }
            #flyer{
                width:80%;
                height: 300px;
                margin-left:135px;

            }
            #column {
                margin-top:50px;
                margin-bottom: 100px;
                display:flex;
                flex-flow: row;
                text-align: center; 
                width: 80%;
                margin-left: auto;
                margin-right: auto;

                }
            .row{
                flex:33%;
            }
            p{
                margin-top:40px;
                font-size: 20px;
                text-align: center;
            }
            #logout{
                text-decoration:none;
                margin-right:20px;
                padding:3px;
                float:right;
                border:3px solid white;
                border-style: outset;
                border-radius: 5px;
                background-color: #e8b8b2;
                color: white;
            }
            body{
                background-color: #f8f6f3;
                font-family: 'Raleway', sans-serif;
                color:#575757;
            }
        </style>
        <script>
            function logout(){
                alert("You are log out!");
            }
        </script>
    </head>
<body>
    <a id="logout" href='logout.php' onclick="logout()">LOG OUT</a>
    <div class="header">
        <span id="header-text">2020 CALENDAR</span>
    </div>
    <!--    I design this image from canva-->
    <img id="flyer" src="image/Screen%20Shot%202020-04-28%20at%202.58.31%20AM.png" alt="">
    <p>create your own calendar and keep track of your life :)</p>
    
        <!--    These monthly image cam from here: 
        https://thecottagemarket.com/pretty-floral-free-printable-2020-calendar/-->
    <div id="column">
        <div class="row">
            <a href="april.php"><img src="image/monthly-april-1.png" alt=""></a>
        </div>
        <div class="row">
            <a href="may.php"><img src="image/monthly-may-1.png" alt=""></a>
        </div>
        <div class="row">
            <a href="june.php"><img src="image/monthly-june-1.png" alt=""></a>
        </div>
    
    </div>
</body>
</html>