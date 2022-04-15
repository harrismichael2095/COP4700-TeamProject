
<!--------------------PHP Section----------------------------------->
<!--Sends input to the Database to confirm user has a valid admin ID. Also confirms name isn't already used for RSO---->
<!----Important note: User has to be an Admin for insert to work. You will know its succesful if the success messages pops up--->
<?php

require_once('connect.php');			 
session_start(); 				
if ($_SESSION['userID'] == -1) {		
    header("Location: http://localhost/Project/index");
}

$showAlert = false;
$showError = false;
$exists=false;
$admin_id = $_SESSION['admin_id'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// Include file which makes the
	// Database Connection.
	require "connect.php";
    
	
	$name = $_POST["name"];
	$RSO_id = $_POST["RSO_id"];
	
	
			
	
	$sql = "Select * from rso where name='$name'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result); // Check if name is in database already.
	
	//num==0 the RSO name isn't in our database.
	if($num == 0) {
		if($exists==false){
	
		
				// insert into our database
			
			$sql = "INSERT INTO `rso` ( `name`,
				`admin_id`,`RSO_id`) VALUES ('$name',
				$admin_id,$RSO_id)";
            
            
            /*if (!mysqli_query($conn,$sql)) {
                die('Error: ' . mysqli_error($conn));     // Checks if insert into the database was succesful
                } */                                      // causes a small error. Uncomment if Insert doesn't work
	
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$showAlert = true;
			}

			else 
			echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> Your not an Admin , become one to Create a RSO
	<button type="button" class="close"
			data-dismiss="alert aria-label="Close">
			<span aria-hidden="true"></span>
	</button>
	</div> ';
		}
		else {
			$showError = "Something went wrong";
		}	
	}
	
if($num>0)
{
	$exists="RSO name not available";
}
	
}// endif
	
?>
	
<!--------------------------------------Front end for the RSO--------------------------------------->
<!doctype html>	
<html lang="en">
<head>	
   <!--Used the same format as a tutorial I followed----->
	<!-- Required meta tags -->
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

<?php
	
	if($showAlert) {
	
		echo ' <div class="alert alert-success
			alert-dismissible fade show" role="alert">
			<strong>Success!</strong> Your RSO has been added to the System
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
			</button>
		</div> ';
	}
	
	if($showError) {
	
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $showError.'
	<button type="button" class="close"
			data-dismiss="alert aria-label="Close">
			<span aria-hidden="true"></span>
	</button>
	</div> ';
}
		
	if($exists) {
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $exists.'
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"></span>
		</button>
	</div>';
	}
?>
	
<div class="container my-4 ">
	
	<h1 class="text-center">Create New Student Organization</h1>
	<form action="" method="post">
	
		<div class="form-group">
			<label for="name">Organization Name</label>
		<input type="text" class="form-control" id="name"
			name="name" aria-describedby="emailHelp">	
		</div>
	
		<div class="form-group">
			<label for="RSO_id">RSO ID</label>
			<input type="text" class="form-control"
			id="RSO_id" name="RSO_id">
            <small id="emailHelp" class="form-text text-muted">
			Uniqely Identifies your RSO  
			</small>
		</div>
	
		<button type="submit" class="btn btn-primary">
		Create
		</button>

        
	</form>
	<h1 class="text-center"><a href="http://localhost/Project/home">Home</a> </h1>
    <h1 class="text-center"><a href="http://localhost/Project/index">Log Out</a> </h1>

</div>

</body>
</html>