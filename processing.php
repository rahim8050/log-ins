<?php 
if (empty($_POST["Username"])){
	die ("Username is required");
}
if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	die ("valid email is required");
}
if (strlen($_POST["password"]) < 8){
	die ("password must be atleast 8 characters");
}
if ( ! preg_match("/[a-z]/i", $_POST["password"])){
	die ("password must contain one letter");
}
if ( ! preg_match("/[0-9]/", $_POST["password"])){
	die ("password must contain one number");
}
if ($_POST["password"] !== $_POST["password_confirmation"])
die ("passwords must match");
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/database.php";
$sql = "INSERT INTO user(Username,email,password_hash) VALUES (?,?,?)";            
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)){
	die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
					$_POST["Username"],
					$_POST["email"],
					$password_hash);
if ($stmt->execute()){
	header("Location: ../signupsuccess.html");
	exit;
}
else {
	if ($mysqli->errno  = 1062){
		die ("email already taken");
	}
	else{
	die ($mysqli->error . " " . $mysqli->errno);
}
}
					
/*var_dump($password_hash);
print_r($_POST);
*/
?>