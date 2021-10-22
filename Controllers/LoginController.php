<?php 

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;
use Controllers\HomeController as HomeController;


/**
 * * instalar extension Better Comments para los comentarios
 * ! aclaracion: no le pego a la api ni al json, es para acomodar las opciones en las sesiones.
 * ! los email estan predefinidos, si no loguea se redirecciona al index.
 * 
 */
class LoginController {

  public function Login($email) {
    // $studentRepo = new StudentDAO();
    // $studentList = $studentRepo->getAllStudent();
    
    if($email == 'admin@myapp.com') {
      header("location:".FRONT_ROOT."Admin");
    }

    if($email == 'wlorant1@sbwire.com') {
      // $_SESSION["student"] = $student;
      header("location:".FRONT_ROOT."Student");         
    }

    if($email != 'admin@myapp.com' || $email != 'wlorant1@sbwire.com') {
      $incorrect = new HomeController();
      $incorrect->Index("Error al ingresar el email");
    }             
  }
  
  public function Logout(){
    header("location: ../index.php");
      
  }  

}

?>
