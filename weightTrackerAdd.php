<?php
//workoutTrackerInsert.php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$user_id = $weight = "";
$user_id_err = $weight_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["user_id"]))){
        $user_id_err = "Please enter a user_id.";
    }
	else{
		$user_id = trim($_POST['user_id']);
	}
    // Validate weight
    if(empty(trim($_POST['weight']))){
        $weight_err = "Please enter a weight.";     
    }else{
        $weight = trim($_POST['weight']);
    }
    
    // Check input errors before inserting in database
    if(empty($user_id_err) && empty($weight_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO weight_tracker (user_id, weight) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_user_id, $param_weight);
            
            // Set parameters
            $param_user_id = $user_id;
            $param_weight = $weight; 

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: indexTest.html");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
	if(!(empty($user_id_err))){
		header("location: indexTest.html?u_err=".$user_id_err); // send error message in the err variable
	}else if(!(empty($weight_err))){
		header("location: indexTest.html?p_err=".$weight_err); // change the html to the one you need to show
	}
}
?>
 

