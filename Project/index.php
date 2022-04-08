<?php
// $mysqli    // = conection to database
require_once('connect.php');
session_start(); // get stored values
$_SESSION['userID'] = -1;   // -1 means user is not logged in


if (array_key_exists('register', $_POST)) {
    header("Location: http://localhost/Project/register");
} else if (array_key_exists('signIn', $_POST)) {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT users.userId FROM users WHERE (users.userName = '$userName' AND users.password = '$password')";
    $results = $mysqli->query($sql);
    if ($results == false) {
        echo ("Incorrect username or password");
    } else {
        while($row = $results->fetch_assoc()){
            echo($row['userId'] );
            $_SESSION['userID'] = $row['userId'];
            header("Location: http://localhost/Project/home");
            }
        }  
}

?>
<h1>Login</h1>
    <div class="content">
    <form method="post">
    <div class="input-field">
        <input required type="text" name="username" placeholder="Username" autocomplete="off">
      </div>
      <div class="input-field">
        <input required type="password" name="password" placeholder="Password" autocomplete="off">
      </div>

        <input type="submit" name="register" class="button" value="Register" formnovalidate/>
          
        <input type="submit" name="signIn" class="button" value="Sign In" />
    </form>
    </div>
<?php


/* previous code

$sql = "SELECT * FROM testy WHERE testy.2 > 0";
$results = $mysqli->query($sql);
if ($results == false) {
    echo ("you have a duplicate.");
} else {
    while($row = $results->fetch_assoc()){
        echo($row['2'] );
    }
}


echo("test test teswwt");

$sql = "INSERT INTO `testy` (`2`, `3`, `4`, `5`) VALUES ('2', '2', '2', '2') ";
#$result = mysqli_query($mysqli, $sql)
$results = $mysqli->query($sql);
echo($results);
if ($results == false) {
    echo ("Entry already exists");
} 

//$result = mysqli_query($mysqli, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($mysqli), E_USER_ERROR);
if (false) header("Location: http://localhost/Project/register");

    */
?>
