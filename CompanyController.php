<?php

namespace Controllers;

use DAO\CompanyDAO as CompanyDAO;
use DAO\StudentDAO as StudentDAO;
use Models\Company as Company;
use Models\Student as Student;
use Utils\Utils;

class CompanyController {
  
  private $CompanyDAO;

  public function __construct() {
    $this->CompanyDAO = new CompanyDAO();
  }

  public function ShowAddView() {
    Utils::checkAdminSession();
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."company-add.php");
  }

  public function ShowCompanyListAdminView() {
    Utils::checkAdminSession();
    $companyList = $this->CompanyDAO->getAllCompany();
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."company-list-admin.php");
  }

  public function ShowCompanyListUpdateAdminView($companyId) {
    Utils::checkAdminSession();
    $companyList=$this->CompanyDAO->getCompanyById($companyId);   
    require_once(VIEWS_PATH . "nav-admin.php");
    require_once(VIEWS_PATH . "company-update.php");
  }


  public function ShowCompanyListStudentView() {
    Utils::checkStudentSession();
    $companyList = $this->CompanyDAO->getAllCompany();
    require_once(VIEWS_PATH."nav-student.php");
    require_once(VIEWS_PATH."company-list-student.php");
  }

  //busca la empresa por su nombre
  public function ShowCompanyName($companyName) {
    // Utils::checkAdminSession();
    $targetCompany = $this->CompanyDAO->getCompanyByName($companyName);
    require_once(VIEWS_PATH."nav-student.php");
    require_once(VIEWS_PATH."company-list-student.php");
  }

  public function ShowUpdateView($company) {
   Utils::checkAdminSession();
   //$company = new Company($companyId, $companyName, $email, $phoneNumber, $address, $city, $country, $totalEmployees, $companyInfo, $active);
   require_once(VIEWS_PATH."nav-admin.php");
   require_once(VIEWS_PATH."company-update.php");
    $this->ShowCompanyListAdminView();
  }
            
  public function AddCompany($companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active) {  
    Utils::checkAdminSession();    
    if($this->CompanyDAO->getCompanyByName($companyName) == null){
    //die(var_dump($this->companyDAO->getCompanyByName($companyName))); 
    $companyId = $this->CompanyDAO->getNextId(); //genera el siguiente ID

    $company = new Company();   
    $company->setCompanyId($companyId);
    $company->setCompanyName($companyName);
    $company->setEmail($email);
    $company->setPhoneNumber($phoneNumber);
    $company->setAddress($address);
    $company->setCity($city);
    $company->setCountry($country);
    $company->setTotalEmployees($totalEmployees);
    $company->setCompanyInfo($companyInfo);
    $company->setActive($active);   

    $this->CompanyDAO->addCompany($company);   
    $this->ShowAddView();

    } else{     
      $existCompanyName = true;
      require_once(VIEWS_PATH . "company-add.php");
    }
  } 
   
       
  public function DeleteCompany($companyId){
    $this->CompanyDAO->deleteCompanyById($companyId);
    $this->ShowCompanyListAdminView();
  }


  public function UpdateCompany($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active){
    //Utils::checkAdminSession(); 

    //Utils::checkAdminCompanySession();
    try {
     // $companies = $this->CompanyDAO->getAllCompany();
     // $jobPositions = $this->JobPositionDAO->getAllActiveCareer();
     // $jobOffers = $this->JobOfferDAO->getJobofferById($companyId);
     
     // $students=$this->StudentDAO->getAllStudent();         
        
          $modifiedCompany = new Company();
          $modifiedCompany->setCompanyId($companyId);
          $modifiedCompany->setCompanyName($companyName);
          $modifiedCompany->setEmail($email);
          $modifiedCompany->setPhoneNumber($phoneNumber);
          $modifiedCompany->setAddress($address);
          $modifiedCompany->setCity($city);
          $modifiedCompany->setCountry($country);
          $modifiedCompany->setTotalEmployees($totalEmployees);   
          $modifiedCompany->setCompanyInfo($companyInfo); 
          $modifiedCompany->setActive($active);      
         
          $this->CompanyDAO->updateCompany($modifiedCompany);         
          $company=$this->CompanyDAO->getCompanyById($companyId);
          
              
          $this->ShowCompanyListAdminView();
    } catch (\PDOException $ex) {
      throw $ex;
    }   
    
  }

}

?>
