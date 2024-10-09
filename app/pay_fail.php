<?php

include_once('../connect/base_url.php');
define('MYSITE', true);
include_once('../include/helper.php');
alert('danger', 'There was an error processing your request. Please try again later.');
header('Location:' . base_url1('home'));
