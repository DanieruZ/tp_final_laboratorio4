<?php
    
namespace Controllers;

use DAO\StudentDAO as StudentDAO;

class StudentController {
      
	private $studentDAO;

  public function __construct() {
      $this->studentDAO = new StudentDAO();
  }

  public function ShowAddView() {
      require_once(VIEWS_PATH."student-add.php");
  }

  public function ShowListView() {
      $studentList = $this->studentDAO->getAllStudent();
      require_once(VIEWS_PATH."student-list.php");
  }

  public function ShowStudenView() {
      $this->ShowAddView();
  }

  public function AddStudent($student) {
    $this->studentDAO->addStudent($student);
    $this->ShowAddView();
  }

  public function DeleteStudent($studentId) {
  	$this->studentDAO->deleteStudentById($studentId);
  	$this->ShowListView();
  }

  public function Index(){
    $this->ShowAddView();
  }

}

?>
