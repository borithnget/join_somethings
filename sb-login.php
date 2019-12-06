<?php 
$_POST = json_decode($HTTP_RAW_POST_DATA, true);
if (isset($_POST["username"]) && isset($_POST["pwd"])) {
	require_once('wp-load.php');
	include_once("services/connection/ClassConnection.php");
   //Database Connection
	$connObj = new ClassConection();
    $conn = $connObj->DB_connection();	
	$un = $_POST["username"];
	$pw = $_POST["pwd"];
	
	$q_userpass="SELECT user_pass FROM wp_users WHERE user_login='".$un."';";
	$result=mysqli_query($conn,$q_userpass) or die(mysqli_error($conn));	
	$user_pass_data = mysqli_fetch_row($result);	
	if($user_pass_data[0]){
		if ( wp_check_password($pw, $user_pass_data[0])){			
			$user = get_user_by("login", $un)->data;			
			um_fetch_user($user->ID);
			$user->description = get_user_meta( $user->ID , 'description', true);
			$user->profile_photo = um_get_avatar_uri( um_profile('profile_photo'), 190);
			$user->cover_photo = um_get_cover_uri( um_profile('cover_photo'));
			echo json_encode($user);
		}
		else{
			echo '';
		}
	}
	else{
		echo 'Invalid user name or password.';
	}
	
	mysqli_close($conn);
	
}
else{
	echo 'Username and password are required!';
}

?>