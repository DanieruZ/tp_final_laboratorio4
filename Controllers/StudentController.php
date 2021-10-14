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
           $studentDAO = new Student();

            $this->ShowAddView();
        }
    }
?>