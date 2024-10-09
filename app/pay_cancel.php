<?php

include_once('../connect/base_url.php');
if($_POST['status'] == 'CANCELLED'){
    define('MYSITE', true);
    include_once('../include/helper.php');
    alert('danger','Your purchase or submission was cancelled.');
    header('Location:'.base_url1('home'));
}else{
    header('Location:'.base_url1('404'));
}