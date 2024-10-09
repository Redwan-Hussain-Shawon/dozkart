<?php
// googleClient.php
include_once('../vendor/autoload.php');

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->addScope("email");
$client->addScope("profile");

?>
