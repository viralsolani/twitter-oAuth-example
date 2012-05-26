<?php	
	int_set('display_errors','1');
	include 'index.php';
	global $connection;
	$messages=$connection->getHomeTimeline('xml');
	echo 'Home Timeline <br>';
	print_r($messages);
	exit;	
?>