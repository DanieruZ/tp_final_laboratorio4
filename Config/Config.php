<?php 

namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/tp_final_laboratorio4/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");

// student's api key
define('API_KEY','4f3bceed-50ba-4461-a910-518598664c08');
define('API_URL_STUDENT','https://utn-students-api.herokuapp.com/api/Student');
define('API_URL_JOBPOSITION','https://utn-students-api.herokuapp.com/api/JobPosition');
define('API_URL_CAREER','https://utn-students-api.herokuapp.com/api/Career');

define("DB_HOST", "localhost");
define("DB_NAME", "lab4");
define("DB_USER", "admin");
define("DB_PASS", "");

?>
