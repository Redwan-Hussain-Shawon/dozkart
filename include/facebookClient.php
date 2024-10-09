<?php
// facebookClient.php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE); // Optional: Error reporting

// Include Facebook SDK
require_once('../vendor/autoload.php');
require_once('../connect/conn.php');

// Initialize Facebook SDK
$fb = new Facebook\Facebook([
    'app_id' => FACEBOOK_ID, // Your Facebook App ID
    'app_secret' => FACEBOOK_SECRET, // Your Facebook App Secret
    'default_graph_version' => 'v2.5',
]);

// Get Facebook Redirect Login Helper
$helper = $fb->getRedirectLoginHelper();
?>