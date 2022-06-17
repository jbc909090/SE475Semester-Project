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
	$sql = "SELECT * FROM meal_plan where user_id = $user_id";
	$result = $link->query($sql);
	if ($result->num_rows > 0) {
		echo "<table><tr><th>user_id</th><th>breakfast_calories</th><th>lunch_calories</th><th>dinner_calories</th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["breakfast_calories"]. "</td><td>" . $row["lunch_calories"]. "</td><td>" . $row["dinner_calories"]. "</td></tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}
	
		
    
        
    }
    
    // Close connection
    mysqli_close($link);
	if(!(empty($user_id_err))){
		header("location: indexTest.html?u_err=".$user_id_err); // send error message in the err variable
	}

?> 
