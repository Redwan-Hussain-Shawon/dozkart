<?php

if (isset($_POST)) {
    define('MYSITE', true);
    include_once("function.php");
    $main = new main();
    include_once("../../connect/base_url.php");
    include_once('../../vendor/autoload.php');
    include_once("../../include/helper.php");
    if(isset($_POST['submit_details_user'])){
        $response = $main->submit_details_user($_POST,getId());
        if($response === 'empty'){
            alert('danger','Input Field Cannot be Empty');
            header('Location:../../dashboard');
            exit();
        }else if($response === 'matching'){
            $_SESSION['form']['date_of_birth'] = $date_of_birth;
            alert('danger','This number already exists. Please provide a new number.');
            header('Location:../../dashboard');
            exit();
        }else if($response === 'Only number allowed'){
            alert('danger','Only number allowed.');
            header('Location:../../dashboard');
            exit();
        }else if($response === 'valid number'){
            alert('danger','Phone number should be exactly 11 digits.');
            header('Location:../../dashboard');
            exit();
        }else if($response === true){
            alert('success','Your Information has Been Updated Successfully!.');
            header('Location:../../dashboard');
            exit();
        }else{
        }
    
    }

    if(isset($_POST['passwor_change__user'])){
        $password = $_POST['password'];
        $nPassword = $_POST['nPassword'];
      $response=  $main->passwordChangeUser($password,$nPassword,getId());
        if(is_array($response)){
            if($response['message'] != 'Passwords do not match.Please try again.'){
                $_SESSION['form']['password'] = $password;
                $_SESSION['form']['error']['nPassword']=$nPassword;
            }
            if($response['message'] === 'Passwords do not match.Please try again.'){
                $_SESSION['form']['error']['password']=$password;
               }
            alert('danger',$response['message']);
            header('Location:../../dashboard');
            exit(); 
        }else{
            alert('success','Password Update');
            header('Location:../../dashboard');
            exit();
        }
    }

    if(isset($_POST['address_add'])){
       $response= $main->addressCreate($_POST,getId());
        if($response === 'empty'){
            alert('danger','Input Field Cannot be Empty');
            header('Location:../../address');
            exit();
        }else if($response === true){
            alert('success','Your address was added successfully!');
            if(isset($_SESSION['redirect_url'])){
                header('Location:../../'.$_SESSION['redirect_url']);
                exit();
            }else{
                header('Location:../../address');
                exit();
            }
          
        
        }else if($response == 'over'){
            alert('danger','You already created too many addresses');
            header('Location:../../address');
            exit();
        }else{
            echo 'error';
           echo $response;
        }
    }

    if(isset($_POST['address_update'])){
        $response= $main->addressUpdate($_POST,getId());
        if($response === 'empty'){
            alert('danger','Input Field Cannot be Empty');
            header('Location:../../address');
            exit();
        }else if($response === true){
            alert('success','Address updated successfully.');
            header('Location:../../address');
            exit();
        }else{
            alert('danger','Input Field Cannot be Empty');
            header('Location:../../address');
        }
    }

    if(isset($_POST['create_request'])){
        $response= $main->createRequest($_POST,$_FILES,getId());
        if($response === 'not validate'){
            alert('danger', 'The image file extension is not valid.');
            header('Location:../../create-request');
        }else if($response === true){
            alert('success', 'Your request has been successfully submitted. We will respond to you promptly.');
            header('Location:../../requests');
        }
    }
  if(isset($_POST['order_change_status'])){
   $response =  $main->orderChangeStatus($_POST);
   if($response === true){
    alert('success','Status Update');
    header('Location:../../sha-admin/success-order');
    exit();
   }
  }

    // if(isset($_POST))
}

?>




   



