<?php
//workoutTrackerInsert.php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$email = $gender = $height = $addess = $age = $name = "";
$email_err = $gender_err = $height_err = $addess_err = $age_err = $name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    }
	else{
		$email = trim($_POST['email']);
	}
    // Validate weight
    if(empty(trim($_POST['gender']))){
        $gender_err = "Please enter a gender.";     
    }else{
        $gender = trim($_POST['gender']);
    }
	if(empty(trim($_POST['height']))){
        $height_err = "Please enter a height.";     
    }else{
        $height = trim($_POST['height']);
    }
	if(empty(trim($_POST['address']))){
        $address_err = "Please enter a address.";     
    }else{
        $address = trim($_POST['address']);
    }
	if(empty(trim($_POST['age']))){
        $age_err = "Please enter a age.";     
    }else{
        $age = trim($_POST['age']);
    }
	if(empty(trim($_POST['name']))){
        $name_err = "Please enter a name.";     
    }else{
        $name = trim($_POST['name']);
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($gender_err) && empty($height_err) && empty($address_err)&& empty($age_err) && empty($name_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO workout_users (email, gender, height, address, age, name) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_email, $param_gender, $param_height, $param_address, $param_age, $param_name);
            
            // Set parameters
            $param_email = $email;
			$param_gender = $gender; 
            $param_height = $height;
			$param_address = $address; 
			$param_age = $age; 
			$param_name = $name; 

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: indexLogin.html");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
	if(!(empty($email_err))){
		header("location: indexUser.html?u_err=".$email_err); // send error message in the err variable
	}else if(!(empty($gender_err))){
		header("location: indexUser.html?p_err=".$gender_err); // change the html to the one you need to show
	}else if(!(empty($height_err))){
		header("location: indexUser.html?p_err=".$height_err); // change the html to the one you need to show
	}else if(!(empty($address_err))){
		header("location: indexUser.html?p_err=".$address_err); // change the html to the one you need to show
	}else if(!(empty($age_err))){
		header("location: indexUser.html?p_err=".$age_err); // change the html to the one you need to show
	}else if(!(empty($name_err))){
		header("location: indexUser.html?p_err=".$name_err); // change the html to the one you need to show
	}
}
?>
 

