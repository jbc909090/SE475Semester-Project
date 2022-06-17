<?php
//workoutTrackerInsert.php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$user_id = $breakfest_calories = $lunch_calories  = $dinner_calories = "";
$user_id_err = $breakfest_calories_err = $lunch_calories_err = $dinner_calories_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["user_id"]))){
        $user_id_err = "Please enter a user_id.";
    }
	else{
		$user_id = trim($_POST['user_id']);
	}
    // Validate breakfest_calories
    if(empty(trim($_POST['breakfest_calories']))){
        $breakfest_calories_err = "Please enter a breakfest_calories.";     
    }else{
        $breakfest_calories = trim($_POST['breakfest_calories']);
    }
    
    // Validate lunch_calories
    if(empty(trim($_POST["lunch_calories"]))){
        $lunch_calories_err = 'Please enter a lunch_calories.';     
    } else{
		$lunch_calories = trim($_POST['lunch_calories']);
    }
	// Validate dinner_calories
	if(empty(trim($_POST["dinner_calories"]))){
        $dinner_calories_err = 'Please enter a dinner_calories.';     
    } else{
		$dinner_calories = trim($_POST['dinner_calories']);
    }
	
    // Check input errors before inserting in database
    if(empty($user_id_err) && empty($breakfest_calories_err) && empty($lunch_calories_err) && empty($dinner_calories_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO meal_plan (user_id, breakfast_calories, lunch_calories, dinner_calories) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_user_id, $param_breakfest_calories, $param_lunch_calories, $param_dinner_calories);
            
            // Set parameters
            $param_user_id = $user_id;
            $param_breakfest_calories = $breakfest_calories; 
			$param_lunch_calories = $lunch_calories;
			$param_dinner_calories = $dinner_calories;

            
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
	}else if(!(empty($breakfest_calories_err))){
		header("location: indexTest.html?p_err=".$breakfest_calories_err); // change the html to the one you need to show
	}else if(!(empty($lunch_calories_err))){
		header("location: indexTest.html?cp_err=".$lunch_calories_err); // change the html to the one you need to show
	}else if(!(empty($dinner_calories_err))){
		header("location: indexTest.html?cp_err=".$dinner_calories_err); // change the html to the one you need to show
	}
}
?>
 

