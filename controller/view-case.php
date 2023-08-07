<?php
include_once '../access.php';
include_once '../model/connection.php';
class GetCases extends Connection{
    public function get_case(){
        $conn = $this->connect();
        $sql = "SELECT * FROM `cases`";
        $result = $conn->query($sql);
        if ($result) {
            $rows = array();
            while ($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            print json_encode($rows);
        } else {
            echo "Error!";
        }
    }
}

?>