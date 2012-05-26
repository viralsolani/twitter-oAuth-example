<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/*echo "<pre>";
print_r($_SESSION);
exit;
*//* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

//print_r($access_token);



/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
//$content = $connection->get('account/verify_credentials');

/* Some example calls */
//$content = $connection->get('users/show', array('screen_name' => 'abraham'));
//$content = $connection->post('statuses/update', array('status' => date(DATE_RFC822)."@ testing oAuth Lib"));
//$content = $connection->post('statuses/destroy', array('id' => 200109628992913410));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

$content = $connection->get('statuses/home_timeline',array('count'=>150)); 
/*$messages=$connection->getHomeTimeline();
	echo 'Home Timeline <br>';
	print_r($messages);*/

/* Include HTML to display on the page */
include('html.inc');
