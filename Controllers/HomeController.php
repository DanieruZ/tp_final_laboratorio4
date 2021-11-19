<?php

namespace Controllers;

use Models\User as User;
use Controllers\StudentController as StudentController;
use Controllers\UserController as UserController;
use Controllers\AdminController as AdminController;
use Utils\Utils as Utils;
use Models\Student as Student;
use Models\Admin as Admin;
use DAO\CareerDAO as CareerDAO;

class HomeController
{  

    public function Login($email)
    {
        $userController = new UserController();
        $user = $userController->getUserByEmail($email);

        if($user) {           
                if ($user->getUserTypeId() == 1) {
                    $adminController = new AdminController();
                    $admin = new Admin();
                    $admin = $adminController->getByEmailAdmin($email);
            
                    $_SESSION['admin'] = $user;

                    require_once(VIEWS_PATH . "admin-welcome.php");
        
                } else if ($user->getUserTypeId() == 2) {
                    $studentController = new StudentController();
                    $student = new Student();
                    $student = $studentController->getByEmail($email);
        
                    if ($student) {                      
                        if($student->getActive()){                             
                            $_SESSION['student'] = $user;                            
                            require_once(VIEWS_PATH . "student-welcome.php");
                        } else {
                            echo"ELSE ELSE";
                            $notActiveStudent = true;
                        require_once(VIEWS_PATH . "login.php");
                        }
                    } else {
                        $invalidEmail = true;
                        require_once(VIEWS_PATH . "login.php");
                    }
                } else if ($user->getUserTypeId() == 3){
                   $_SESSION['company'] = $user;
                   // require_once(VIEWS_PATH . "company-welcome.php");
                }           
            
        } else {
            $invalidEmail = true;
            echo"ENTRO FUERA DEL LOGIn";
            require_once(VIEWS_PATH . "login.php");
        }
    } 
    
    public function RedirectHome()
    {
        Utils::checkSession();

        if (isset($_SESSION['admin'])) {
            require_once(VIEWS_PATH . "admin-welcome.php");
        } else {
            
            require_once(VIEWS_PATH . "student-welcome.php");
        }
       
    }

    public function ShowCompanyRegister()
    {
        require_once(VIEWS_PATH . "company-user-registration.php");
    }

    public function ShowStudentRegister()
    {
        require_once(VIEWS_PATH . "student-user-registration.php");
    }

    public function Index()
    {
        require_once(VIEWS_PATH . "login.php");
    }

    public function Logout() {
        session_destroy();
        $this->Index();
    }
}
