<?php
if (empty($_POST["feedback"])){
	die ("feedback is required");
}
$mysqli = require __DIR__ . "/database.php";
$sql = "INSERT INTO feedback(feedback) VALUES (?)";            
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)){
	die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("s",
					$_POST["feedback"]
					);
                    if ($stmt->execute()){
                        echo("feedback submitted successfully");
                        exit;
                    }
                    
                        else{
                        die ($mysqli->error . " " . $mysqli->errno);
                    }
                    
                                    
?>