<?php 
  include_once("../connect/base_url.php");
  include_once('../vendor/autoload.php');
  
  
  if(!defined('MYSITE')){
    header("location: ".base_url1('home'));
  }
  include_once("../connect/conn.php");
  include_once("../include/helper.php");

    if (isset($_SERVER['REDIRECT_URL'])) {
        $pagePath = ucwords(substr($_SERVER['REDIRECT_URL'], strrpos($_SERVER['REDIRECT_URL'], '/') + 1));
        $pagePath = preg_replace('/[^a-zA-Z0-9০-৯অ-ঁ\-]/', ' ', $pagePath);
           $pagePath = preg_replace('/-+/', ' ', $pagePath);
    }else {
        $pagePath = 'home';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagePath == 'home' ? 'Dozkart' : $pagePath ?></title>
    <link rel="icon" href="<?php base_url('assets/img/dozkart.png') ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/fixt.css'); ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php base_url('assets/css/slider.min.css') ?>">
    <script src="<?php base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php base_url('assets/js/slider.min.js') ?>"></script>
    
