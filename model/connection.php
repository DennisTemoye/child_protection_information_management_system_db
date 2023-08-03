<?php
// include "access.php";
// include('./access.php');    
class Connection{
    private $db_na = "child_abuse_management_system(admin)";
    private $db_host = "localhost";
    private $db_hos = "root";
    private $password = "";
    public function connect(){
        sleep(1);
        $conn = new mysqli($this->db_host, $this->db_hos, $this->password, $this->db_na);
        if($conn){
            return $conn;
        }else{
            echo "Connection failed";
        }
    }
    public function name(){
        return $this->db_host;
    }
}
?>