<?php include 'templates/autoloader.php';

$email = htmlspecialchars($_POST['email']);
$pass= htmlspecialchars($_POST['password']);

$object= new Controler;
$object->checkUser($email,$pass);

if($_POST && $object->checkUser($email,$pass) != false){

	If(in_array($email, $object->checkUser($email,$pass)) && in_array($pass, $object->checkUser($email,$pass))){
		$object->startSession($email,$pass);
		header('Location:index.php');
	}

	else { 
		header('Location:login-form.php?error=true');
	}
}
else {
	header('Location:login-form.php?error=true');
}

?>