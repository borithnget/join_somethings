<?php 


if (isset($_POST["username"]) && isset($_POST["pwd"])) {
	require_once('wp-load.php');
	$conn = mysqli_connect('themepug.com','themepug_root', 'Pa$$w0rd', 'themepug_wordpress');
	if (!$conn ) {
	    die('Could not connect: ' . mysql_error());
	}
	
	$un = $_POST["username"];
	$pw = $_POST["pwd"];
	
	$q_userpass="SELECT user_pass FROM wp_users WHERE user_login='".$un."';";
	//$q_userpass="SELECT user_pass FROM wp_users WHERE user_login='bunthea';";
	$result=mysqli_query($conn,$q_userpass) or die(mysqli_error($conn));
	
	$user_pass_data = mysqli_fetch_row($result);
	
	if($user_pass_data[0]){
		if ( wp_check_password($pw, $user_pass_data[0])){
			$qu="SELECT * FROM wp_users WHERE user_login='".$un."' AND user_pass='".$user_pass_data[0]."';";
			
			$result=mysqli_query($conn,$qu) or die(mysqli_error($conn));
			
			$number_of_row = mysqli_num_rows($result);
			$temp_array = array();
			if($number_of_row > 0){
				while($row = mysqli_fetch_assoc($result)){
					$temp_array[] = $row;
				}   
				header('Content-Type: application/json');
				echo json_encode(array("users"=>$temp_array));         
			}
			else{
				echo 'unknown';
			}
		}
		else{
			echo 'wrong password';
		}
	}
	else{
		echo 'sorry';
	}
	
	mysqli_close($conn);
	
}
else{
	echo 'username and pwd are needed!';
}

?>