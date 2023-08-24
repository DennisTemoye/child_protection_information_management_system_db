<?php
require_once '../../access.php';
require_once '../../model/connection.php';
class Register extends Connection {
    
    public function handle_submit(){
        $targetDir = 'C:\EMMA\my_project\REACT\child-abuse-management-system\public\ '; // Make sure this directory exists
        $targetFile = $targetDir . basename($_FILES['image']['name']);
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
        $imagePath = $conn->real_escape_string($targetFile);
        $image_name = $_POST['imageName'];
        $mysql = "INSERT INTO `children`(`id`, `firstname`, `lastname`, `password`, `age`, `gender`, `address`, `email`,`phone`,`bio`,`country`,`citystate`,`postal_code`,`home_address`,`gurdian_address`,`school_address`, `avatar`, `img_name`) VALUES (NULL,'$firstname','$lastname','$password','$age','$gender','$address','$email','$phone','$bio','$country','$citystate','$postal_code','$home_address','$gurdian_address','$school_address', '$imagePath', '$image_name')";
        if ($check) {
            echo "empty values !!";
        } else if ($stml = $conn->prepare("SELECT `id` `password` FROM `children` WHERE `email` =  ?")) {
            $stml->bind_param('s', $email);
            $stml->execute();
            $stml->store_result();
            if ($stml->num_rows > 0) {
                echo "Account already exists";
            } 
            else if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){

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