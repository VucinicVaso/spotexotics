<?php
include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message = array();

	$firstname        = $function->checkInput($_POST['firstname']);
	$lastname         = $function->checkInput($_POST['lastname']);
	$email            = $function->checkInput($_POST['email']);
	$city             = $function->checkInput($_POST['city']);
	$country          = $function->checkInput($_POST['country']);
	$day              = $function->checkInput($_POST['day']);
	$month            = $function->checkInput($_POST['month']);
	$year             = $function->checkInput($_POST['year']);
	$profile_image    = 'assets/images/profile.png';
	$password         = $function->checkInput($_POST['password']);
	$confirm_password = $function->checkInput($_POST['confirm_password']);

	/********** validate firstname, lastname and nickname **********/
	if(empty($firstname)) {
		$message['firstname_error'] = 'Please enter firstname.';
	}
	if(empty($lastname)) {
		$message['lastname_error'] = 'Please enter lastname.';
	}
	/********** validate email **********/
	if(empty($email)){
		$message['email_error'] = "Please enter email.";
	}else {
		if($user->checkEmail($email)) {
			$message['email_error'] = 'Email is already taken!';
		}					
	}	
	/********** validate city **********/
	if(empty($city)){
		$message['city_error'] = "Please enter city.";
	}
	/********** validate country **********/
	if(empty($country)){
		$message['country_error'] = "Please enter country.";
	}
	/********** validate day **********/
	if(empty($day)){
		$message['day_error'] = "Please enter day of birth.";
	}	
	/********** validate month **********/
	if(empty($month)){
		$message['month_error'] = "Please enter month of birth.";
	}	
	/********** validate year **********/
	if(empty($year)){
		$message['year_error'] = "Please enter year of birth.";
	}else if($user->checkAge($year) === false){
		$message['year_error'] = "Minimum age requirement is 16!";
	}		
	/********** validate password **********/
	if(empty($password)) {
		$message['password_error'] = 'Please enter password.';
	}else if(strlen($password) < 6) {
		$message['password_error'] = 'Password must be at least 6 characters.';
	}else if(preg_match('/[^A-Za-z0-9]/', $password)){
		$message['password_error'] = 'Your password can only contain numbers and characters!';
	}else if($user->checkPassword($password) === true){
		$message['password_error'] = 'Password is already taken!';
	}
	/********** validate confirm password **********/
	if(empty($confirm_password)) {
		$message['confirm_password_error'] = 'Please enter Confirm Password.';
	}else if($password != $confirm_password) {
		$message['confirm_password_error'] = 'Passwords do not match.';
	}
	/********** if errors are empty **********/
	if(empty($message)){
		/* create username */
		$username    = $firstname."-".$lastname."-".$function->getRandomInteger(); 
		/* format date of birth */
		$dateofbirth = $year."-".$month."-".$day;
		$date        = new DateTime($dateofbirth);
		$date        = $date->format('Y-m-d');
		/* encypt password */
		$password    = password_hash($password, PASSWORD_BCRYPT);
		/* register user */
		$profile_created = $crud->create('users', array('firstname' => $firstname, 'lastname' => $lastname, 'username' => $username, 'profile_image' => $profile_image, 'email' => $email, 'password' => $password, 'date_of_birth' => $date, 'city' => $city, 'country' => $country, 'admin' => 0)); 
		if($profile_created){
			$message['success'] = "Profile created successfully!";
		}else {
			$message['error'] = "Something went wrong please try again!";
		}
	}

	/* send message */
	if(!empty($message)){
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json");
		echo json_encode($message);
	}
}else {
	return false;
}
?>