<?php

namespace Controllers;

use Utils\Utils as Utils;

class LoginController {

  public function Login($email) {
    Utils::initAdminSession($email);
    Utils::initStudentSession($email);
  }

  public function Logout() {
    Utils::logout();
  }
  
}

?>
