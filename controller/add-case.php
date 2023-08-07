<?php
include_once '../access.php';
include_once '../model/connection.php';
class AddCase extends Connection{
   public function add_new_case(){
        $user_id = $_POST['userId'];
        $case_id = $_POST['caseId'];
        $type = $_POST['type'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $coon = $this->connect();
        $sql = "INSERT INTO `cases` (`id`, `case_id`, `type`, `time`, `location`, `name`, `date`, `user_id`) VALUES (NULL, '$case_id', '$type', '$time', '$location', '$name', '$date', '$user_id')";
        $result = $coon->query($sql);
        if($result){
            echo "Case added successfully";
        } else {
            echo "Error !"; 
        }
    }
}
?>