<?php 
session_start();
include_once ('../../connect/base_url.php');
if(isset($_SESSION['admin_redwan'])){
    unset($_SESSION['admin_redwan']);
    redirect('doz-admin');
}
?>