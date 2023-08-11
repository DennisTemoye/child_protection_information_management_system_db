<?php
include_once '../access.php';
include_once '../model/connection.php';
class Profile extends Connection{
    public function get_profile() {
        if(isset($_GET['email'])){
        $conn = $this->connect();
        $email = $_GET['email'];
        $sql = "SELECT * from `children` WHERE `email` = '$email'";
        $result = $conn->query($sql);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
          print json_encode($rows);
        }   
        }
}
?>