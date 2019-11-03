<?php include "template/header.php";
include "template/connection.php";

$usernames = array();
$sql_usernames = "SELECT * FROM users";
$tiket= mysqli_query ($mysqlConnection, $sql_usernames);
while ($row = mysqli_fetch_assoc($tiket)){
	$usernames[] = $row;
}

$emails = array();
$userneme_check = array();
foreach ($usernames as $x) {
	array_push($emails, $x["user_email"]);
	array_push($userneme_check, $x["user_username"]);
}


$name = $_POST["name"];
$email = $_POST["email"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];

if ($_POST) {
	if ($name !="" && $lastname!= "" && $email != "" && $username !=""){
		if (!is_numeric($name)){
			if (!in_array($email, $emails)){
				if (!is_numeric($lastname)){
					if (!in_array($username, $userneme_check)){

						$sql= "INSERT INTO users (user_id, user_name, user_lastname, user_email, user_username, Password) VALUES (NULL, '".$name."','".$lastname."','".$email."', '".$username."', '".$password."')";
							mysqli_query($mysqlConnection, $sql);
						
						} 
						else { ?>
							<div class="alert alert-danger" role="alert">
  							Username is already in use!
							</div>
							<?php } 

						
				}
					else { ?>
						<div class="alert alert-danger" role="alert">
  							Last name cannot be numeric!
						</div>

					<?php }

			}
				else { ?>
					<div class="alert alert-danger" role="alert">
  							Email address is already used for registration!
					</div>
				<?php }
		}

			else { ?>
			<div class="alert alert-danger" role="alert">
  							Name cannot be numeric!
			</div>

		<?php	} 
	} 
		else { ?>
			<div class="alert alert-danger" role="alert">
  							All fields have to be filled!
			</div>

		<?php }

}


?>
<div class="text-centered">
<h5><a href="register.php">Back to Sing-up</a></h5>
</div>