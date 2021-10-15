<?php 
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;

    class LoginController{
        public function Login($email){
           
            $studentRepo = new StudentDAO();
            $studentList = $studentRepo->getAllStudent();
            if($email == "admin@myapp.com"){
                //var_dump($email);
                header("location:".FRONT_ROOT."Admin");
            }
            $student = $studentRepo->getStudentByEmail($email);

            if($student){
                $_SESSION["student"]=$student;
                header("location:".FRONT_ROOT."Student");           
            }else{
                $incorrect = new HomeController();
                $incorrect->index("Error al ingresar el email");
            }             
        }
    public function Logout(){
        header("location: ../index.php");
      
    }  
}

?>