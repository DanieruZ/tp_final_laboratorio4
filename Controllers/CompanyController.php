<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use DAO\StudentDAO as StudentDAO;
    use Models\Company as Company;
    use Models\Student as Student;

    class CompanyController
    {
        private $CompanyDAO;
        private $StudentDAO;

        public function __construct()
        {
            $this->CompanyDAO = new CompanyDAO();
            $this->StudentDAO = new StudentDAO();
        }

        




        public function ShowAddView()
        {
           
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListViewAdmin()
        {
            $title = "List of company";
            $companyList = $this->CompanyDAO->getAllCompany();
            require_once(VIEWS_PATH."student-list-company.php");
        }

        public function ShowListViewStudent()
        {
            $title = "List of company";
         //   $student = $_SESSION["student"];
            $studentList = $this->StudentDAO->getAllStudent();

            require_once(VIEWS_PATH."company-list-student.php");
        }

        public function ShowCompanyName($companyName){
            $companyList = $this->CompanyDAO->getCompanyByName($companyName);
            require_once(VIEWS_PATH."company-list-student.php");
        }

        public function ShowUpdateView($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active){
            $company = new Company($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active);
            $title = "Update $companyName";
           // require_once (VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."company-update.php");
        }
            
        public function AddCompany($companyName, $email, $phoneNumber,$address,$city,$country,$totalEmployees,$companyInfo,$active)
        {   
            
            //die(var_dump($companyId));
            $companyId = $this->CompanyDAO->getNextId();// generate sequential increment iD
            $company = new Company($companyId,$companyName,$email, $phoneNumber,$address,$city,$country,$totalEmployees,$companyInfo,$active);
            $this->CompanyDAO->addCompany($company);//metodo de DAO            
            echo "<script> if(confirm('company successfully charged with success'));";
            echo "</script>";
            $this->ShowAddView();
        }
       
        public function DeleteCompany($companyId){
            $this->CompanyDAO->deleteCompanyById($companyId);
            $this->ShowListViewAdmin();
        }

        

        public function UpdateCompany($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active){
            $this->CompanyDAO->updateCompany($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active);
            $this->ShowListViewAdmin();
        }
    
        }

    

?>