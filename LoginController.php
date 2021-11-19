<?php

namespace Controllers;

use Utils\Utils as Utils;
use Models\User as User;
use Controllers\StudentController as StudentController;
use Controllers\UserController as UserController;
use Models\Student as Student;
use DAO\CareerDAO as CareerDAO;

// class LoginController
// {

//   public function Login($email)
//   {
//     $userController = new UserController();
//     $user = $userController->getUserByEmail($email);

//     if ($user != NULL) {
//       if ($user->getUserTypeId() == 1) {

//         $_SESSION['admin'] = $user;      
//         die(var_dump($_SESSION['admin']));

//         require_once(VIEWS_PATH."student-list-admin.php");
        
//       } 
//     } else {
//       $invalidEmail = true;
//       require_once(VIEWS_PATH . "index.php");
//     }
//   }

//   public function Index()
//   {
//     require_once(VIEWS_PATH . "index.php");
//   }


//   public function Logout()
//   {
//     session_destroy();

//     $this->Index();
//   }
// }
// ?>
