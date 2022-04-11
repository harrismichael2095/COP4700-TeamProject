<?php
// $mysqli    // = conection to database
require_once('connect.php');
session_start(); // get stored values
$_SESSION['userID'] = -1;   // -1 means user is not logged in
$_SESSION['admin_id'] = -1;


if (array_key_exists('register', $_POST)) {
    header("Location: http://localhost/Project/register");
} else if (array_key_exists('signIn', $_POST)) {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT user.user_id FROM user WHERE (user.username = '$userName' AND user.password = '$password')";
    $results = $mysqli->query($sql);
    if ($results == false) {
        echo ("Incorrect username or password");
    } else {
        while($row = $results->fetch_assoc()){
            echo($row['user_id'] );
            $_SESSION['userID'] = $row['user_id'];

            header("Location: http://localhost/Project/home");
            }
        }  


        //Save Admin ID like userID so user can use it so create new RSO
        $user_id = $_SESSION["userID"];
        $sql = "SELECT admin.admin_id FROM admin WHERE (admin.user_id = $user_id)";
        $test = $mysqli->query($sql);                       
        if($test == false){ echo ("This user is not an Admin yet");
        }
        else{
        while($row = $test->fetch_assoc()){
            echo($row['admin_id'] );
            $_SESSION['admin_id'] = $row['admin_id'];
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
