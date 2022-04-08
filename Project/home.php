<?php
// start of Code reqquired to be logged in
// $mysqli    // = conection to database
require_once('connect.php');
session_start(); // get stored values
if ($_SESSION['userID'] == -1) {
    header("Location: http://localhost/Project/index");
}
// End of Code reqquired to be logged in

echo ("use only user Id for querys: ");
echo ($_SESSION['userID']);

// HTML code bellow
?>


<a href="http://localhost/Project/index">LogOut</a>


<?php

//continue PHP code here

?>
