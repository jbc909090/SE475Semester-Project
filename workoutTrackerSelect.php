<?php
//workoutTrackerSelect.php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$user_id = "";
$user_id_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["user_id"]))){
        $user_id_err = 'Please enter user_id.';
    } else{
        $user_id = trim($_POST["user_id"]);
    }
    
    if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM workout_tracker where user_id = $user_id";
	$result = $link->query($sql);
	if ($result->num_rows > 0) {
		echo "<table><tr><th>user_id</th><th>workout_id</th><th>workout_date</th><th>amount</th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["workout_id"]. "</td><td>" . $row["workout_date"]. "</td><td>" . $row["amount"]. "</td></tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}
	
		
    
        
    }
    
    // Close connection
    mysqli_close($link);
	if(!(empty($user_id_err))){
		header("location: indexLogin.html?u_err=".$user_id_err); // send error message in the err variable
	}

?> 
