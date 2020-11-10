<?php

require_once './../../util/initialize.php';

if (isset($_POST['save'])) {
    $student = new Student();
    $student->name = trim($_POST['name']);
    $student->address = trim($_POST['address']);
    $student->age = trim($_POST['age']);
    $student->student_status_id = trim($_POST['student_status_id']);

    try {
        $student->save();
        Activity::log_action("Role - saved : ".$student->name);
        $_SESSION["message"] = "Successfully saved.";
         Functions::redirect_to("../student.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to save.";
        Functions::redirect_to("../student.php");
    }
}

if (isset($_POST['update'])) {
    $student = Student::find_by_id($_POST['id']);
    $student->name = trim($_POST['name']);
    $student->address = trim($_POST['address']);
    $student->age = trim($_POST['age']);
    $student->student_status_id = trim($_POST['student_status_id']);
   
    try {
        $student->save();
        Activity::log_action("Role - updated : ".$student->name);
        $_SESSION["message"] = "Successfully updated.";
        Functions::redirect_to("../student.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to update.";
        Functions::redirect_to("../student.php");
    }
}


if (isset($_POST['delete'])) {
    $role = Role::find_by_id($_POST["id"]);
    
    try {
        $role->delete();
        Activity::log_action("Role - deleted : ".$role->name);
        $_SESSION["message"] = "Successfully deleted.";
        Functions::redirect_to("../role.php");
    } catch (Exception $exc) {
        $_SESSION["error"] = "Error..! Failed to deleted.";
        Functions::redirect_to("../role.php");
    }
}
?>

