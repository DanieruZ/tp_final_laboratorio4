<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->getAllStudent();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowStudenView()
        {
           //$studentDAO = new Student();

            $this->ShowAddView();
        }

        public function AddStudent($careerId, $firstName, $lastName, $dni, $fileNumber, $gender, $birthDate, $email, $phoneNumber, $active)
        {
            $studentId = $this->studentDAO->getNextId();
            $student = new Student($studentId,$careerId, $firstName, $lastName, $dni, $fileNumber, $gender, $birthDate, $email, $phoneNumber, $active);
            $this->studentDAO->addStudent($student);

            $this->ShowAddView();
        }

        public function DeleteStudent($studentId){
           
           $this->studentDAO->deleteStudentById($studentId);
            $this->ShowListView();

        }
    }
?>