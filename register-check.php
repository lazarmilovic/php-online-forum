<?php 

include 'templates/autoloader.php';

$name=htmlspecialchars($_POST['name']);
$lastname=htmlspecialchars($_POST['lastname']);
$username=htmlspecialchars($_POST['username']);
$pass=htmlspecialchars($_POST['password']);
$email=htmlspecialchars($_POST['email']);

$object= new Controler();
$emails= array_column($object->getUsers(),'user_email');
$usernames= array_column($object->getUsers(), 'user_username');

if ($_POST) {
	if ($name !="" && $lastname!= "" && $email != "" && $username !=""){
		if (!is_numeric($name)){
			if (!in_array($email, $emails)){
				if (!is_numeric($lastname)){
					if (!in_array($username, $usernames)){

						$object->newUser($name, $lastname, $email, $username, $pass);
						
						} 
						else {
							header('Location:register-form.php?username_err=true');
						}
						
				}
					else { 
						header('Location:register-form.php?lastname_err=true');
					 }

			}
				else { 
					header('Location:register-form.php?email_err=true');
					 }
		}

			else { 
				header('Location:register-form.php?name_err=true');
				} 
	} 
		else { 
			header('Location:register-form.php?filled_err=true');
		}

}


?>