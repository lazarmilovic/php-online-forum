<?php include "template/header.php";
include "template/connection.php";

$email= $_POST["email"];
$pass= $_POST ["password"];

$array= array();
$sql= "SELECT * FROM users";
$tiket = mysqli_query($mysqlConnection, $sql);
while ($row= mysqli_fetch_assoc($tiket)){
	$array[]=$row;
}

$emails = array();
$passwords = array();
$names= array();

foreach ($array as $x) {
	array_push($emails, $x["user_email"]);
	array_push($passwords, $x["Password"]);
	array_push($names, $x["user_name"]);
}


if(in_array($email, $emails) && in_array($pass, $passwords)){
	$sessionName= array();
	$sql= "SELECT user_name, user_username FROM users WHERE user_email = '$email' AND Password= '$pass' ";
	$tiket= mysqli_query($mysqlConnection,$sql);
	while ($row= mysqli_fetch_assoc($tiket)) {
		$sessionName[]=$row;
	}
		if (sizeof($sessionName)>0){
			session_start();
			$_SESSION["name"]= $sessionName[0]["user_name"];
			$_SESSION["user_name"] = $sessionName[0]["user_username"];
			echo $_SESSION["user_name"];
			header('Location:index.php');
		} 
		else { ?>
			<div class="alert alert-danger" role="alert">
  				Data deosn't match! Please try again. 
			</div>

		<?php  }

	
}
else { ?>
	<div class="alert alert-danger" role="alert">
  		Enter data again please!
	</div>
	<?php 	}
?>
<div class="text-centered">
<h5><a href="login-form.php">Back to Sing-up</a></h5>
</div>
<?php include "template/footer.html"; ?>