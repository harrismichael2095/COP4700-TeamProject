<?php
require_once('connect.php');			 
session_start(); 				
if ($_SESSION['userID'] == -1) {		
    header("Location: http://localhost/Project/index");
}

if (isset($_POST['submit'])) {
  
    require "connect.php";
    $category = $_POST['category'];
    $sql = "Select * from event where category='$category'";
    /*$Events = "select * 
			   from event 
			   where event_id = (select event_id from RSO_event where RSO_id = (select RSO_id from apart where user_id = '$user_id'))
			   OR event_id = (select event_id from private_event where school = '$school')
			   OR event_id = (select event_id from public_event)"; */
    $result = mysqli_query($conn, $sql);
	  $num = mysqli_num_rows($result);
  }

?>

<!--------------------------------HTML--------------------------------------------->

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
<h2 class="text-center">Choose a Category to display associated events</h2> <br>
<small id="emailHelp" class="form-text text-muted text-center">
			Public - Public events near your Location
			</small>
      <small id="emailHelp" class="form-text text-muted text-center">
			Private - Private events on your College Campus
			</small>
      <small id="emailHelp" class="form-text text-muted text-center">
			RSO - Private events hosted by your Registered Student Organization
			</small> <br>

<form method="post" class="text-center">
  <label for="category"class="text-center">Category:</label>
  <input type="text" id="category" name="category" class="text-center"> 
  <input type="submit" name="submit" class="text-center">
  
</form>

<?php
if (isset($_POST['submit'])) {
  if ($result && $num > 0) { ?>
    <h2>Events</h2>

    <table>
      <thead>
<tr>
<th>Category</th>
  <th>Event Name</th>
  <th>Description</th>
  <th>Email Address</th>
  <th>Contact Number</th>
  <th>Location</th>
  <th>Date</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo ($row["category"]); ?>&nbsp;</td>
<td><?php echo ($row["name"]); ?></td>
<td><?php echo ($row["description"]); ?></td>
<td><?php echo ($row["email"]); ?></td>
<td><?php echo ($row["phone"]); ?></td>
<td><?php echo ($row["location"]);?></td>
<td><?php echo ($row["date_time"]);?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>

   
  <?php } else { ?>
    > No results found for <?php echo ($_POST['category']); ?>.
  <?php }
} ?>

<h1 class="text-center"><a href="index.php">Home</a></h1>
<h1 class="text-center"><a href="http://localhost/Project/index">Log Out</a> </h1>



