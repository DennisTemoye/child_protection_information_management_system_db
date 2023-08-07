<?php
require_once '../../access.php';
require_once '../../model/connection.php';
class Register extends Connection {
    
    public function handle_submit(){
        // $check_empty = empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['state']) || empty($_POST['city']) || empty($_POST['phone']) || empty($_POST['address']);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $bio = $_POST['bio'];
        $country = $_POST['country'];
        $citystate = $_POST['citystate'];
        $postal_code = $_POST['postal_code'];
        $home_address = $_POST['home_address'];
        $gurdian_address = $_POST['gurdian_address'];
        $school_address = $_POST['school_address'];
        $check = !isset($firstname) || !isset($lastname) || !isset($email) || !isset($address) || !isset($gender) || !isset($age) || !isset($password)|| !isset($phone)|| !isset($bio) || !isset($country)|| !isset($citystate)|| !isset($postal_code)|| !isset($home_address)|| !isset($gurdian_address)|| !isset($school_address);
        $conn = $this->connect();
        $mysql = "INSERT INTO `children`(`id`, `firstname`, `lastname`, `password`, `age`, `gender`, `address`, `email`,`phone`,`bio`,`country`,`citystate`,`postal_code`,`home_address`,`gurdian_address`,`school_address`) VALUES (NULL,'$firstname','$lastname','$password','$age','$gender','$address','$email','$phone','$bio','$country','$citystate','$postal_code','$home_address','$gurdian_address','$school_address')";
        if ($check) {
            echo "empty values !!";
        } else if ($stml = $conn->prepare("SELECT `id` `password` FROM `children` WHERE `email` =  ?")) {
            $stml->bind_param('s', $email);
            $stml->execute();
            $stml->store_result();
            if ($stml->num_rows > 0) {
                echo "Account already exists";
            } 
            else{
            $result = $conn->query($mysql);
        if ($result) {
            echo "Account Created successful";
        } else{
            echo "Error!!";
           
        }
    }
        }  
    }
}
$method = new Register;
$method->handle_submit()
?>