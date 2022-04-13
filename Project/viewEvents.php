
<?php

require_once('connect.php');			 
session_start(); 				
if ($_SESSION['user_id'] == -1) {		
    header("Location: http://localhost/Project/index");
}

//global variables to access when echoing the html
$resultsArray = null;
$num = 0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	require "connect.php";
    
	$user_id = $_POST["user_id"];
	$school = $_POST["school"];
	
	$Events = "select * 
			   from event 
			   where event_id = (select event_id from RSO_event where RSO_id = (select RSO_id from apart where user_id = '$user_id'))
			   OR event_id = (select event_id from private_event where school = '$school')
			   OR event_id = (select event_id from public_event)";
	
	$results = mysqli_query($conn, $Events);
	$num = mysqli_num_rows($results); // returns how many entries found but for some reason only returns 0? 
									  //was testing and changing the global variable from 0 fixes it so I think the global variables 
									  //might be constant for some reason or its not changing?
	//cant figure this out :0
	$resultsArray = array($results);
	while($row = mysqli_fetch_array()){
		$resultsArray[] = $row['name'];
	}
	
	
}// endif
	
?>
	
<!doctype html>	
<html lang="en">
<head>	
  <meta charset="utf-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1,
		shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
		crossorigin="anonymous">
</head>	
<body>
<div class="container my-4 ">
	<h1 class="text-center">List of Events</h1>
<?php
	for($i = 0;$i < $num; $i++) {
		echo ' <div>Event Name: '.$resultsArray[$i]['name'].' Event id: '.$resultsArray[$i]['event_id']'</div>';
	}
?>
    <h1><a class = "text-center" href="http://localhost/Project/index">Log Out</a> </h1>
</div>

</body>
</html>
