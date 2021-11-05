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
    require_once(VIEWS_PATH."nav-admin.php");
    $companyList = $this->CompanyDAO->getAllCompany();
    require_once(VIEWS_PATH."company-list-admin.php");
  }

  public function ShowCompanyListStudentView() {
    Utils::checkStudentSession();
    // $student = $_SESSION["student"];
    require_once(VIEWS_PATH."nav-student.php");
    $companyList = $this->CompanyDAO->getAllCompany();
    require_once(VIEWS_PATH."company-list-student.php");
  }

  public function ShowCompanyName($companyName) {
    Utils::checkAdminSession();
    require_once(VIEWS_PATH."nav-student.php");
    $targetCompany = $this->CompanyDAO->getCompanyByName($companyName);
    require_once(VIEWS_PATH."company-list-student.php");
  }

  public function ShowUpdateView($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active) {
    Utils::checkAdminSession();
    require_once(VIEWS_PATH."nav-admin.php");
    $company = new Company($companyId, $companyName, $email, $phoneNumber, $address, $city, $country, $totalEmployees, $companyInfo, $active);
    require_once(VIEWS_PATH."company-update.php");
    $this->ShowCompanyListAdminView();
  }
            
  public function AddCompany($companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active) {  
    Utils::checkAdminSession();    
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
  }
       
  public function DeleteCompany($companyId){
    $this->CompanyDAO->deleteCompanyById($companyId);
    $this->ShowCompanyListAdminView();
  }


  public function UpdateCompany($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active){
    Utils::checkAdminSession(); 
    $this->CompanyDAO->updateCompany($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active);
    $this->ShowCompanyListAdminView();
  }

}

?>
