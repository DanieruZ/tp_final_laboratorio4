<?php 

namespace Utils;

class Utils {

    public static function checkSession(){
        if(!(isset($_SESSION['admin']) || isset($_SESSION['student']) || isset($_SESSION['company']))){
            $userNotLogged = true;
            require_once(VIEWS_PATH ."index.php");
        }
    }


    public static function checkAdminSession() {
        if(!(isset($_SESSION['admin']))) {
          Utils::logout();
        }
    }
    

    public static function checkStudentSession() {
        if(!(isset($_SESSION['student']))) {
          Utils::logout();
        }
    }


    public static function checkCompanytSession() {
        if(!(isset($_SESSION['company']))) {
          Utils::logout();
        }
    }


    // public static function checkAdminSession(){
    //     if(!(isset($_SESSION['admin']))){
    //         $userNotAdmin = true;
    //         require_once(VIEWS_PATH ."index.php");
    //     }
    // }

    // public static function checkAdminCompanySession(){
    //     if(!(isset($_SESSION['admin']) || isset($_SESSION['company']))){
    //         $userNotAdmin = true;
    //         require_once(VIEWS_PATH ."index.php");
    //     }
    // }

    public static function strStartsWith(String $haystack, String $needle){
        return $needle != '' && strncmp($haystack, $needle, strlen($needle)) == 0;
    }
    

    public static function logout() {
        session_destroy();
        header("location: ../index.php");
    }

}

?>