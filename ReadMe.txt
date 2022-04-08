index.php = login page functionallity comlete
home.php = home page  // waht user sees after loging in      		// needs work
register.php = register page // functionallity comlete

connect.php = code that connects to database

// For all pages logged in include this code first
require_once('connect.php');			// gets acces to database connection $mysqli
session_start(); 				// get all stored values: $_SESSION['name'] = data to store globaly
if ($_SESSION['userID'] == -1) {		// prevents acces to page without logging in
    header("Location: http://localhost/Project/index");
}


// Use $_SESSION['userID']
// To make quereys specific to loged in user
// Can also use userId for admins (by storing admins user Id in other tables.(like RSO)


// code notes
close php using '?>' whenever you want to write some html code if you use php file
reapoen php when your done with '<?php'

<form method="post" or "get" > </form>     	// to get user inputs for query
// post examples in index and register
// Only one form at a time


// Notes For Set up
Dowload Wamp using link provided on web courses    // When asked to provide info. there should be a link above with download. (so dont give them your data)

Go to files where you downloaded Wamp
enter www folder
Copy Project folder into www

using wamp open phpmyadmin and login
create database named university
click on university then click import
then import the university.sql file

// to test Code
on wamp wselect localhost
Then in browser search http://localhost/Project/index



