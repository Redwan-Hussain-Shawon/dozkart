<?php 
     include_once("../connect/base_url.php"); 
    if ($localhost.$_SERVER['REQUEST_URI']==base_url1($title_url)) {
        session_start();
        $login = $_SESSION["admin"][md5("admin_create")];
        $time = $_SESSION["admin"][md5("time")];
        $user = $_SESSION["admin"][md5("identit")];
        $ip = $_COOKIE[md5("ip")];
        if ($login && $user  && $ip && $user ) {  
?>




<?php
     }else {
        header("location: ".base_url1('home'));
    }   
   
    }else {
        header("location: ".base_url1("home"));
    }
?>
<div class="con" style="max-width:500px">
    <h1><marquee behavior="" direction="">আগামি ১০-০৫-২০২৪ তারিখ পর্যন্ত আমাদের সমস্ত কার্যকর্ম বন্ধ থাকিবে।</marquee></h1>
    <h3>আমারা অতান্ত দুঃখের সাথে জানাচ্ছি যে, আমাদের ওয়েবসাইটের কিছু টেকনিকেল সমস্যার কারনে আগামি ১০-০৫-২০২৪ তারিখ পর্যন্ত আমাদের সমস্ত কার্যকর্ম বন্ধ থাকিবে। </h3>
</div>
<style>
    .con{
        max-width: 500px;
        margin: auto;
    }
</style>