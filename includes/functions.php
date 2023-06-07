<?php
function email_exists($email) 
{
	global $conn;

	$sql = "SELECT id FROM usertbl WHERE email = '$email'";

	$result = $conn->query($sql);

	if($result->num_rows == 1 ) {
		return true;
	} else {
		return false;
	}
}

function get_name($email) {
	global $conn;

	$sql = "SELECT first_name FROM usertbl WHERE email = '$email'";

	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	return $row["first_name"];
}

function set_message($message) 
{
	if(!empty($message)){
		$_SESSION['message'] = $message;
	}else {
		$message = "";
	}
}

function display_message()
{
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];

		unset($_SESSION['message']);
	}
}

function redirect($location){
	return header("Location: {$location}");
}

function validation_errors($error_message) 
{
$error_message = <<<DELIMITER

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  	<strong>Warning!</strong> <?php echo $error_message; ?>
</div>

DELIMITER;

set_message($error_message);
}

function logged_in(){
	if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
		return true;
	} else {
		return false;
	}
}

?>