<?php
	$DB_USER = 'themepug_root';
	$DB_PASSWORD = 'Pa$$w0rd';
	$DB_DATABASE = 'themepug_wordpress';
	$DB_HOST = 'localhost';    

	$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}              
	$sql = "SELECT guid FROM wp_posts p INNER JOIN wp_em_events e ON p.`ID`=e.`post_id` WHERE event_status=1 AND recurrence<>1";
	$result = $conn->query($sql);

	$i = 0;
	$file = 'Share Count/share_'.date("Y-m-d").'.csv';
	$string = "Share URL, Shared Count\r\n";

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
			$url = $row['guid'];			
			$access_token = '1085238511552895|487d7dcae8356d83feb8d2629a93ccf9';
			$api_url = "https://graph.facebook.com/v2.7/?id=".urlencode($url) . "&access_token=" . $access_token;
			$json_return = file_get_contents($api_url);			
			
			$objects = json_decode($json_return);
			// // var_dump($objects);
			$shared = $objects->share->share_count;
			// if($shared!=null){
				$string .= $url . "," . $shared . "\r\n";
			// }
			// $string .= $url . "," . ++$i . "\r\n";
		}		
	}

	try{
			file_put_contents($file, $string);
		}catch(Exception $e){
			var_dump($e->getMessage());
		}
	/*
	$i = 0;
	$file = 'test.csv';
	$string = "Share URL, Shared Count\r\n";
	foreach($results as $result){
		$requrl = get_post_permalink($result->post_id);
		$graph = "http://graph.facebook.com/?id=".$requrl;
		$json = file_get_contents($graph);
		$objects = json_decode($json);
		$shared = $objects->share->share_count;
	//		if($shared){
	//			$string .= "Shared: " . $shared . "->" . $requrl . "\n";
	//		}
		$string .= $requrl . "," . ++$i . "\r\n";
	}
	*/	
?>	