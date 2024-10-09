<?php
class Main
{
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        include_once("../../connect/conn.php");
        $this->conn = $conn;
    }

    public function admin_log($user_name, $user_pass)
    {
        $user_name = $this->conn->real_escape_string($user_name);
        $user_pass = $this->conn->real_escape_string($user_pass);
        $sql = "SELECT * FROM user WHERE email='$user_name' AND password='$user_pass'";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {

            return true;
        } else {
            return false;
        }
    }
    public function submit_details_user($post, $user_id)
    {
        $name = mysqli_real_escape_string($this->conn, trim($post['name']));
        $date_of_birth = mysqli_real_escape_string($this->conn, trim($post['date_of_birth']));
        $phone = mysqli_real_escape_string($this->conn, trim($post['phone']));
        $gender = mysqli_real_escape_string($this->conn, trim($post['gender']));
        $sql = "SELECT * FROM user WHERE phone='$phone' AND id != $user_id";
        $result = $this->conn->query($sql);
        if ($name == '' || $phone == '' || $date_of_birth == '' || $gender == '') {
            return 'empty';
        } else if ($result->num_rows > 0) {
            return 'matching';
        } else if (!preg_match('/^[0-9]+$/', $phone)) {
            return 'Only number allowed';
        } else if (strlen($phone) !== 11) {
            return 'valid number';
        } else {
            $sql = "UPDATE user SET name='$name',date_of_birth='$date_of_birth',phone='$phone',gender='$gender' WHERE id=$user_id";
            if ($this->conn->query($sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function passwordChangeUser($password, $nPassword, $user_id)
    {
        $password = mysqli_real_escape_string($this->conn, trim($password));
        $nPassword = mysqli_real_escape_string($this->conn, trim($nPassword));


        $sql = "SELECT password FROM user WHERE id = $user_id";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                if (strlen($nPassword) < 6) {
                    return ['status' => 'danger', 'message' => 'Your new password must be at least 6 characters long.'];
                } else if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $nPassword)) {
                    return ['status' => 'danger', 'message' => 'Your new password must include at least one special character.'];
                } else {
                    $nPasswordHash = password_hash($nPassword, PASSWORD_DEFAULT);
                    $update_sql = "UPDATE user SET password='$nPasswordHash' WHERE id=$user_id";
                    if ($this->conn->query($update_sql)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return $response = ['status' => 'danger', 'message' => "Passwords do not match.Please try again."];
            }
        }
    }


    public function addressCreate($data, $user_id)
    {
        $name = mysqli_real_escape_string($this->conn, trim($data['name']));
        $phone = mysqli_real_escape_string($this->conn, trim($data['phone']));
        $email = mysqli_real_escape_string($this->conn, trim($data['email']));
        $country = mysqli_real_escape_string($this->conn, trim($data['country']));
        $postal_code = mysqli_real_escape_string($this->conn, trim($data['postal_code']));
        $district = mysqli_real_escape_string($this->conn, trim($data['district']));
        $thana_upazilla = mysqli_real_escape_string($this->conn, trim($data['thana_upazilla']));
        $company = mysqli_real_escape_string($this->conn, trim($data['company']));
        $address = mysqli_real_escape_string($this->conn, trim($data['address']));
        $type = mysqli_real_escape_string($this->conn, trim($data['type']));
        
        $sql = "SELECT id FROM address WHERE user_id=$user_id";
        $resutl = $this->conn->query($sql);
        if($resutl->num_rows>4){
            return 'over';
        }

        if (isset($_POST['default_address'])) {
            $default_address = mysqli_real_escape_string($this->conn, trim($data['default_address']));
            if ($default_address == 1) {
                $sql = "SELECT id FROM address WHERE user_id=$user_id AND default_address=1";
                $resutl = $this->conn->query($sql);
                if ($resutl->num_rows > 0) {
                    $data = $resutl->fetch_assoc();
                    $id = $data['id'];
                    $sql = "UPDATE address SET default_address = 0 WHERE id = $id";
                    if ($this->conn->query($sql)) {
                    }
                }
            }
        } else {
            $default_address = 0;
        }
        if (empty($name) || empty($phone) || empty($email) || empty($country) || empty($postal_code) || empty($district) || empty($thana_upazilla) || empty($company) || empty($address) || empty($type)) {
            return 'empty';
        } else {
            $sql = "INSERT INTO address (user_id, name, phone, country, postal_code, district, thana_upazilla, address, email, company, type, default_address) VALUES ($user_id, '$name', '$phone', '$country', '$postal_code', '$district', '$thana_upazilla', '$address', '$email', '$company', '$type', '$default_address')";

            if ($this->conn->query($sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function addressUpdate($data, $user_id)
    {
        $address_id = base64_decode($data['address_id']);
        $address_id = mysqli_real_escape_string($this->conn, trim($address_id));
        $name = mysqli_real_escape_string($this->conn, trim($data['name']));
        $phone = mysqli_real_escape_string($this->conn, trim($data['phone']));
        $email = mysqli_real_escape_string($this->conn, trim($data['email']));
        $country = mysqli_real_escape_string($this->conn, trim($data['country']));
        $postal_code = mysqli_real_escape_string($this->conn, trim($data['postal_code']));
        $district = mysqli_real_escape_string($this->conn, trim($data['district']));
        $thana_upazilla = mysqli_real_escape_string($this->conn, trim($data['thana_upazilla']));
        $company = mysqli_real_escape_string($this->conn, trim($data['company']));
        $address = mysqli_real_escape_string($this->conn, trim($data['address']));
        $type = mysqli_real_escape_string($this->conn, trim($data['type']));


        if (isset($_POST['default_address'])){
            $default_address = mysqli_real_escape_string($this->conn, trim($data['default_address']));
            if ($default_address == 1) {
                $sql = "SELECT id FROM address WHERE user_id=$user_id AND default_address=1";
                $resutl = $this->conn->query($sql);
                if ($resutl->num_rows > 0) {
                    $data = $resutl->fetch_assoc();
                    $id = $data['id'];
                    $sql = "UPDATE address SET default_address = 0 WHERE id = $id";
                    if ($this->conn->query($sql)) {
                    }
                }
            }
        } else {
            $default_address = 0;
        }

        if (empty($name) || empty($phone) || empty($email) || empty($country) || empty($postal_code) || empty($district) || empty($thana_upazilla) || empty($company) || empty($address) || empty($type)) {
            return 'empty';
        } else {
            $sql = "UPDATE address SET 
            name = '$name',
            phone = '$phone',
            email = '$email',
            country = '$country',
            postal_code = '$postal_code',
            district = '$district',
            thana_upazilla = '$thana_upazilla',
            company = '$company',
            address = '$address',
            type = '$type',
            default_address=$default_address
            WHERE id = $address_id";

            if ($this->conn->query($sql)) {
                return true; 
            } else {
                return false;
            }
        }
    }
public function imgValidate($sImg_name,$sImg_tmp_name,$path){
        $extension = pathinfo($sImg_name, PATHINFO_EXTENSION);
        $valD_extension = ['png', 'jpg', 'jpeg', 'gif'];
        if(in_array($extension, $valD_extension)){
          $sImg_new_name = rand() . rand() . '.' . $extension;
          if(move_uploaded_file($sImg_tmp_name, $path . $sImg_new_name)){
            return $sImg_new_name;
          }
}else{
    return 'not validate';
}
}

    public function createRequest($data,$file,$user_id){
        $product_link = mysqli_real_escape_string($this->conn, trim($data['product_link']));
        $link  = mysqli_real_escape_string($this->conn, trim($data['link']));
        $title  = mysqli_real_escape_string($this->conn, trim($data['title']));
        $image_url  = mysqli_real_escape_string($this->conn, trim($data['image_url']));
        $quantity  = mysqli_real_escape_string($this->conn, trim($data['quantity']));
        $district  = mysqli_real_escape_string($this->conn, trim($data['district']));
        $instructions  = mysqli_real_escape_string($this->conn, trim($data['instructions']));
        $propropskey = $data['propskey'];
        $propsvalue = $data['propsvalue'];
        $props = json_encode(array_combine($propropskey,$propsvalue));
        if(isset($file['product_image']['name']) && !empty($file['product_image']['name'])){
            $product_image = $this->imgValidate($file['product_image']['name'],$file['product_image']['tmp_name'],'../images/request/');
            if($product_image == 'not validate'){
                return 'not validate';
            }
        }else{
            $product_image = null;
        }
        $sql = "INSERT INTO product_request (user_id, product_link, link, title, image_url, product_image, quantity, shop, props,instructions, status) 
        VALUES ('$user_id', '$product_link', '$link', '$title', '$image_url', '$product_image', '$quantity', '$district', '$props','$instructions', 1)";
        if($this->conn->query($sql)){
            return true;
        }    
    }

    public function orderChangeStatus($value){
        $status = mysqli_real_escape_string($this->conn, trim($value['changestatus']));
        $id = mysqli_real_escape_string($this->conn, trim($value['order_id']));
        $sql = "UPDATE orders SET status = $status WHERE id = $id";
        if($this->conn->query($sql)){
            // notifications process
            $sql1 = "SELECT user_id,product_id FROM orders WHERE id=$id";
            if($result = $this->conn->query($sql1)){
                $data = $result->fetch_assoc();
                $user_id = $data['user_id'];
                $product_id = $data['product_id'];
                $product_sql = "SELECT product_photo FROM product_main WHERE asin='$product_id'";
                $product_result = $this->conn->query($product_sql);
                $product_data = $product_result->fetch_assoc();
                $product_photo = $product_data['product_photo'];
                if($status != 3){
                    if ($status == 4) {
                        $description = 'Your order is currently being processed.';
                    } else if ($status == 6) {
                        $description = 'Your order is on the way to you.';
                    } else if ($status == 7) {
                        $description = 'Your order is being returned.';
                    } else if ($status == 8) {
                        $description = 'Your order has been successfully delivered.';
                    } else if ($status == 9) {
                        $description = 'Sorry, the product you ordered is currently unavailable.';
                    }                    
                    $sql2 = "INSERT INTO notifications(user_id,description,img)VALUES($user_id,'$description','$product_photo')";
                    if($this->conn->query($sql2)){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return true;
                }
               
            }
        }else{
            return false;
        }
    }
    public function notificationsOrder($order_id,$description){
     
       
    }
}
