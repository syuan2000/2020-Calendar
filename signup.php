<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri

    // HTTPS redirect
//     if ($_SERVER['HTTPS'] !== 'on') {
// 		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// 		header("Location: $redirectURL");
// 		exit;
// 	}
	
	// http://us3.php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
        $error = 'You already had an account. Please login';
        require "login_form.php";
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_user();
	} else {
		login_form();
	}
	
	function create_user() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
    
        
        if(strcmp($password, $confirmPass) == 0){
           // Require the credentials
            require_once 'db.php';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "login_form.php";
                exit;
            }
            
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);
            

            // Build query
            $query = "INSERT INTO users(username, userPassword) VALUES ('$username', sha1('$password'))";
//            print $query;
//            exit;

            // If there was a result...
            if ($mysqli->query($query)=== TRUE) {
                $error = ' New User Created Successfully! ';
                require "login_form.php";
                exit;
                
        } 
        // Else, there was no result
        else {
          $error = 'You already had an account. Please login';
        require "login_form.php";
		exit;
        }
            $mysqli->close();
            exit;
	} 
    else{
        $error="Error: Passwords do not match.";
        require "signup_form.php";
        exit;
    }
    }
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
        exit;
	}
	
?>