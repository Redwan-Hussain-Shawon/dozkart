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