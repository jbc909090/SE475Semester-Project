<?php
//workoutTrackerInsert.php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$user_id = $workout_id = $amount = "";
$user_id_err = $workout_id_err = $amount_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["user_id"]))){
        $user_id_err = "Please enter a user_id.";
    }
	else{
		$user_id = trim($_POST['user_id']);
	}
    // Validate workout_id
    if(empty(trim($_POST['workout_id']))){
        $workout_id_err = "Please enter a workout_id.";     
    }else{
        $workout_id = trim($_POST['workout_id']);
    }
    
    // Validate amount
    if(empty(trim($_POST["amount"]))){
        $amount_err = 'Please enter amount.';     
    } else{
		$amount = trim($_POST['amount']);
    }
    
    // Check input errors before inserting in database
    if(empty($user_id_err) && empty($workout_id_err) && empty($amount_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO workout_tracker (user_id, workout_id,amount) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_user_id, $param_workout_id,$param_amount);
            
            // Set parameters
            $param_user_id = $user_id;
            $param_workout_id = $workout_id; 
			$param_amount = $amount; 

            
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
	}else if(!(empty($workout_id_err))){
		header("location: indexTest.html?p_err=".$workout_id_err); // change the html to the one you need to show
	}else if(!(empty($amount_err))){
		header("location: indexTest.html?cp_err=".$amount_err); // change the html to the one you need to show
	}
}
?>
 

