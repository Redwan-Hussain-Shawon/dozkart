<?php 
function productImage($slug,$conn){
   $sql = "SELECT * FROM product_image WHERE product_slug ='$slug'";
   $result = $conn->query($sql);
   if($result->num_rows>0){
     $data = $result->fetch_all(MYSQLI_ASSOC);
     return $data;
   }else{
    return false;
   }
}

function productColor($slug,$conn){
    $sql = "SELECT * FROM product_color WHERE product_slug ='$slug'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
      $data = $result->fetch_all(MYSQLI_ASSOC);
      return $data;
    }else{
     return false;
    }
 }
 function productSize($slug,$conn){
  $sql = "SELECT * FROM product_size WHERE product_slug ='$slug'";
  $result = $conn->query($sql);
  if($result->num_rows>0){
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
  }else{
   return false;
  }
}
?>