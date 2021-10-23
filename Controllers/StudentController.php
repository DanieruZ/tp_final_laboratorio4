<?php
    
namespace Controllers;

use DAO\StudentDAO as StudentDAO;

class StudentController {
      
	private $studentDAO;

  public function __construct() {
    $this->studentDAO = new StudentDAO();
  }

  public function ShowStudentWelcomeView() {
    require_once(VIEWS_PATH."nav-student.php");
    require_once(VIEWS_PATH."student-welcome.php");
  }

  public function ShowAddView() {
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."student-add.php");
  }

  public function ShowAdminListView() {
    require_once(VIEWS_PATH."nav-admin.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH."student-list-admin.php");
  }

  public function ShowStudentListView() {
    require_once(VIEWS_PATH."nav-student.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH."student-list.php");
  }

  public function AddStudent($student) {
    $this->studentDAO->addStudent($student);
    $this->ShowAddView();
  }

  public function DeleteStudent($studentId) {
  	$this->studentDAO->deleteStudentById($studentId);
  	$this->ShowAdminListView();
  }

  public function Index(){
    $this->ShowStudentWelcomeView();
  }

}

?>
