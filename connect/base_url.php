<?php
    $pro_name = "dozkart"; 
    $localhost = "http://localhost";
    $localhost_a = "http://localhost/";
    
    
    
    function base_url($url){
        global $pro_name,$localhost_a; 
        $page = $_SERVER['SCRIPT_NAME'];
        $page = str_replace($pro_name, "", $_SERVER['SCRIPT_NAME']);
        $remove =rtrim($_SERVER['SCRIPT_NAME'], $page);            
        if ($remove !== ""){
            $remove1 =$remove."";
            $servarname =$localhost_a.$pro_name."/";
        }else{
            $servarname = 'http://localhost/dozkart/';  // some thing rong
        }
        
        echo $servarname.$url;
    }
   




    function base_url1($url){
        global $pro_name,$localhost_a;        
        $page = $_SERVER['SCRIPT_NAME'];
        $page = str_replace($pro_name, "", $_SERVER['SCRIPT_NAME']);
        $remove =rtrim($_SERVER['SCRIPT_NAME'], $page);
            
        if ($remove !== ""){            
            $remove1 =$remove."";
            $servarname =$localhost_a.$pro_name."/";
        }else{

            $servarname = 'https://www.createofbrand.com/';
        }
        
        return $servarname.$url;
    }
    function redirect($url){
        header('Location:'.base_url1('').$url);
        exit();
    }

    $title_url = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],"/")+1);
    function alart($type,$mass) {
        session_start();
        $_SESSION['alart']["type"] = $type;
        $_SESSION['alart']["mass"] = $mass;
    }
    function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        return $text;
       }


?>