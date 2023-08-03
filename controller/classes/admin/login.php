<?php
class Login extends Database
{
    public $email;
    public $password;
    
    public $result = '';
    public $child_table = 'login';

    public function adminLoginInfo($condition = "", $field = "*", $column = "")
    {
        return $this->lookUp($this->child_table, $field, $condition, $column);
    }

    public function singleAdminLoginInfo($id)
    {
        $this->result = $this->adminLoginInfo("id = '$id'");
        $this->email = $this->result['email'];
        $this->password = $this->result['password'];
        
    }

    public function numberOfLoginRow($condition)
    {
        return $this->countRows($this->child_table, "*", $condition);
    }
    public function isExist($condition)
    {
        return $this->numberOfLoginRow($condition);
    }
    // public function validation(){

    // }
    public function processAdminLoginInfo($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
       
        $this->saveAdminLoginInfo();
    }
    public function saveAdminLoginInfo()
    {
        return $this->save($this->child_table, "email = '$this->email', password='$this->password'");
    }
}
