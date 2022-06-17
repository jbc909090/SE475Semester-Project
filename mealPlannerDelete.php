<?php
//workoutPlannerDelete.php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$user_id = "";
$user_id_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["user_id"]))){
        $user_id_err = "Please enter a user_id.";
    }
	else{
		$user_id = trim($_POST['user_id']);
	}
    
    
    // Check input errors before inserting in database
    if(empty($user_id_err)){
        
        // Prepare an insert statement
        $sql = "Delete from meal_plan where (user_id= ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_user_id);
            
            // Set parameters
            $param_user_id = $user_id;            

            
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
	}
}
?>