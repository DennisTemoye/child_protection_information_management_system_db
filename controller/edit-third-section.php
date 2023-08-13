<?php
include_once '../access.php';
include_once '../model/connection.php';
class EditThirdDetails extends Connection{
    public function edit_content() {
        if (isset($_GET['email'])) {
            $conn = $this->connect();
            $unique_email = $_GET['email'];
            $country = $_POST['country'];
            $citystate = $_POST['citystate'];
            $postal_code = $_POST['postal_code'];
            $gurdian_address = $_POST['gurdian_address'];
            $school_address = $_POST['school_address'];
            $home_address = $_POST['home_address'];
    
            $sql = "UPDATE `children` SET `home_address` = '$home_address', `school_address` = '$school_address', `gurdian_address` = '$gurdian_address', `postal_code` = '$postal_code', `citystate` = '$citystate',  `country` = '$country' WHERE `email` = '$unique_email'";
            $result = $conn->query($sql);
    
            if ($result) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo 'No Email';
        }
    }
    
}
?>