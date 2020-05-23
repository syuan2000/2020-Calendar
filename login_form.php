<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SIGNUP</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
      

        <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
        <script>
            $( document ).ready(function() {
                $( "#navbar" ).load( "navbar.html" );
            });
            $(function(){
                $("input[type=submit]").button();
            });
        </script>
        <style>
            #wrapper{
                background-color: #ffffff;
                height: 1000px;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
                margin-top:0;
            }
            #header{
                text-align: center;
                padding-top: 90px;
                margin-top: 0;
                margin-bottom: 0;
                font-size: 70px;
                color:#696056;
            }
            #caption{
                margin-top: 5px;
                color:dimgray;
                text-align: center;
                font-family: 'Courgette', cursive;
                margin-bottom: 40px;
            }
            #column{
                display:flex;
                flex-flow: row;
                text-align: center;
                margin-right:auto;
                margin-left: auto;
                margin-top: 80px;
                height:40%;
                width:70%;

            }
            #formWrapper {
                width: 60%;
                background-color: #f5f5f4;
                border: 1px solid #DDD;
            }
            .row{

                flex:50%;
            }
            h1{
                margin-top: 40px;
                margin-bottom: 40px;
            }
            label {
                width: 95px;
                text-align: right;
                display: inline-block;
            }
            .stack {
                margin: 1em 0;
            }
            #photo{
                width: 100%;
                height: 100%;
            }
            #link{
                color:#503636;
            }
            body{
                background-image: url(image/b.jpg);
                font-family: 'Raleway', sans-serif;
            }
            #b{
                margin-top: 20px;
            }
            hr{
                width: 80%;
                margin-top: 100px;
            }
            #copyright{
                text-align: center;
                font-size:12px;
            }

        </style>
    </head>
<body>
    <div id="wrapper">
        <p id="header">2020 BULLET JOURNAL</p>
        <p id="caption">== create your own unique journal ==</p>
        <div id="navbar">
        </div>
        <div id="column">
            <div class="row">
            <img id="photo" src="image/login.png" alt="">
            </div>

            <form id="formWrapper" name="Form" action="login.php" method="POST" class="row">
                <?php
                    if ($error) {
                    print "<div class=\"ui-state-error\">$error</div>\n";
                    }
                ?>
                <h1>Log in</h1>
                <input type="hidden" name="action" value="do_login">
            
                <div class="stack">
                    <label for="username">User name:</label>
                    <input type="text" id="username" name="username" value="<?php print $username; ?>" required>
                </div>
            
                <div class="stack">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
            
            
                <div class="stack" id="B">
                    <input type="submit" value="Submit">
                </div>
                <a id="link" href="signup_form.php">Not a user?</a>
            </form>
            
        </div>
        <hr>
                <p id="copyright">copyright@2020</p>
    </div>
    
</body>
</html>