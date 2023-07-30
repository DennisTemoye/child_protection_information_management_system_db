<?php
class Child extends Database
{
    public $first_name;
    public $last_name;
    public $address;
    public $age;
    public $gender;
    public $result = '';
    public $child_table = 'child';

    public function childInfo($condition = "", $field = "*", $column = "")
    {
        return $this->lookUp($this->child_table, $field, $condition, $column);
    }

    public function singleChildInfo($id)
    {
        $this->result = $this->childInfo("id = '$id'");
        $this->first_name = $this->result['first_name'];
        $this->last_name = $this->result['last_name'];
        $this->address = $this->result['address'];
        $this->age = $this->result['age'];
        $this->gender = $this->result['gender'];
    }

    public function numberOfChildRow($condition)
    {
        return $this->countRows($this->child_table, "*", $condition);
    }
    public function isExist($condition)
    {
        return $this->numberOfChildRow($condition);
    }
    // public function validation(){

    // }
    public function processChildInfo($first_name, $last_name, $address, $age, $gender)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->age = $age;
        $this->gender = $gender;
        $this->saveChildInfo();
    }
    public function saveChildInfo()
    {
        return $this->save($this->child_table, "first_name = '$this->first_name', last_name='$this->last_name',address = '$this->address',age='$this->age',gender='$this->gender'");
    }
}
