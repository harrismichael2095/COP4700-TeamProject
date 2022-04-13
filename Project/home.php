<?php
// start of Code required to be logged in

require('connect.php');
session_start(); // get stored values
if ($_SESSION['user_id'] == -1) {
    header("Location: http://localhost/Project/index");
}

if ($_SESSION['admin_id'] == -1) {		
    echo("Test");
}
// End of Code required to be logged in


// These 2 echoes Tell us user_id and AdminID of the current user. Can use this to create new RSO.
        echo ' <div class="alert alert-success
			alert-dismissible fade show" role="alert">
			<strong>User ID:</strong>'.$_SESSION['user_id'].'
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
			</button>
		</div> ';

        echo ' <div class="alert alert-success
			alert-dismissible fade show" role="alert">
			<strong>Admin ID</strong>:'.$_SESSION['admin_id'].'
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
			</button>
		</div> ';


$user_id = $_SESSION["user_id"]; // store the current user_id so we can use it to make current user Admin or Super Admin or both
$exists=false;



///////////////Make USER  ADMIN if the buttom is clicked///////////
if(isset($_POST['admin'])) {
    //We know the button works atleast if we see the Button Works message
    echo ' <div class="alert alert-success
    alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Admin Buttons Works!
    <button type="button" class="close"
        data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"></span>
    </button>
</div> ';
$sql = "Select * from admin where user_id='$user_id'"; // Check to see if User ID is in the admin table already
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result); // if num == 0 user id is not in the admin table. We can make this user an admin.   
if($num==0)                      // if num  > 0  user_id is in the database already. Already and Admin cant use the same user_id.
{
    if($exists==false){
    $sql = "INSERT INTO `admin` (`user_id`) VALUE ($user_id)";
    $result = mysqli_query($conn, $sql); 
    if ($result) {
        echo ' <div class="alert alert-success
			alert-dismissible fade show" role="alert">
			<strong>Success!</strong> Your Officially an Admin!
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
			</button>
		</div> ';
    }
}
else
echo ("Something went Wrong");
}

if($num>0)
{
	$exists="Your an Admin already";
    echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $exists.'
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"></span>
		</button>
	</div>';
    
}	

}
//////////////End of Admin button//////////////



//Make User SuperAdmin if button is clicked..... its the same as above code for admin
if(isset($_POST['SuperAdmin'])) {
    echo ' <div class="alert alert-success
    alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Super Admin Buttons Works!
    <button type="button" class="close"
        data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"></span>
    </button>
    </div> ';
    $sql = "Select * from super_admin where user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result); // Check if user is a SuperAdmin in database already.

    if($num==0){
        if($exists==false){
        $sql = "INSERT INTO `super_admin` (`user_id`) VALUE ($user_id)";
        $result = mysqli_query($conn, $sql); 
            if ($result) {
            echo ' <div class="alert alert-success
			alert-dismissible fade show" role="alert">
			<strong>Success!</strong> Your Officially a Super Admin!
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
			</button>
		    </div> ';
            }
        }
            else
            echo ("Something went Wrong");
    }

    if($num>0)
    {
	$exists="Your a Super Admin already";
    echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $exists.'
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"></span>
		</button>
	    </div>';   
    }	

}
?>






<!--------------------------------------HTML------------------------------------------>


<head>	
   <!--Using the same format as a tutorial I followed----->
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

<div class="class="text-center>
<h1>Welcome</h1>
<form method="post">
        <input type="submit" name="admin"
                value="Become an Admin">

        <input type="submit" name="SuperAdmin"
                value="Become a Super Admin">
        
     
       <a href="createRSO.php"><strong>Create RSO</strong></a> 
	   <a href="viewEvents.php"><strong>View Events</strong></a>

    <h1><a class = "text-center" href="http://localhost/Project/index">Log Out</a> </h1>


</div>
