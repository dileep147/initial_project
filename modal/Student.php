<?php

// update code
require_once __DIR__.'/../util/initialize.php';

class Student extends DatabaseObject{
    protected static $table_name="student";
    protected static $db_fields=array(); 
    protected static $db_fk=array("student_status_id"=>"StudentStatus");
    
//    public $id;
//    public $name;

    public function student_status_id()
    {
        return parent::get_fk_object("student_status_id");
    }
}

?>

