<?php 

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
			$qu="SELECT * FROM wp_users WHERE user_login='".$un."' AND user_pass='".$user_pass_data[0]."';";			
			$result=mysqli_query($conn,$qu) or die(mysqli_error($conn));			
			$number_of_row = mysqli_num_rows($result);
			$temp_array = array();
			$user_avatar = array();
			if($number_of_row > 0){
				while($row = mysqli_fetch_assoc($result)){
					$temp_array[] = $row;
					$user_avatar[]['img_url'] = um_get_avatar_url(get_avatar($row['ID']));					
				}   
				
				header('Content-Type: application/json');
				echo json_encode(array("users"=>$temp_array, "user_avatar"=>$user_avatar));
				//echo json_encode(array("avatar_user"=>$user_avatar));
				//echo get_avatar_url(temp_array[0]);
				
			}
			else{
				echo 'Invalid user name or password.';
			}
		}
		else{
			echo 'Invalid user name or password.';
		}
	}
	else{
		echo 'Invalid user name or password.';
	}
	
	mysqli_close($conn);
	
}
else{
	echo 'username and pwd are needed!';
}

?>