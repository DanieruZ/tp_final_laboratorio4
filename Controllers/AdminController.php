<?php
    namespace Controllers;

    use DAO\AdminDAO as AdminDAO;

    class AdminController
    {
        private $adminDAO;

        public function __construct()
        {
            $this->adminDAO = new AdminDAO();
        }
        public function ShowAdminMainView(){
            $title= "Admin";
            require_once(VIEWS_PATH."admin-main.php");
        }

       
        
        public function Index(){
            $this->ShowAdminMainView();
        }

    }

?>