<?php

namespace Controllers;

use DAO\CompanyDAO as CompanyDAO;
use DAO\StudentDAO as StudentDAO;
use Models\Company as Company;
use Models\Student as Student;

class CompanyController {
  
  private $CompanyDAO;

  public function __construct() {
    $this->CompanyDAO = new CompanyDAO();
  }

  public function ShowAddView() {
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."company-add.php");
  }

  public function ShowAdminListView() {
    require_once(VIEWS_PATH."nav-admin.php");
    $companyList = $this->CompanyDAO->getAllCompany();
    require_once(VIEWS_PATH."company-list-admin.php");
  }

  public function ShowStudentListView() {
    // $student = $_SESSION["student"];
    require_once(VIEWS_PATH."nav-student.php");
    $companyList = $this->CompanyDAO->getAllCompany();
    require_once(VIEWS_PATH."company-list-student.php");
  }

  public function ShowCompanyName($companyName) {
    require_once(VIEWS_PATH."nav-student.php");
    $targetCompany = $this->CompanyDAO->getCompanyByName($companyName);
    require_once(VIEWS_PATH."company-list-student.php");
  }

  public function ShowUpdateView($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active) {
    require_once(VIEWS_PATH."nav-admin.php");
    $company = new Company($companyId, $companyName, $email, $phoneNumber, $address, $city, $country, $totalEmployees, $companyInfo, $active);
    require_once(VIEWS_PATH."company-update.php");
    $this->ShowAdminListView();
  }
            
  public function AddCompany($companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active) {  
    $companyId = $this->CompanyDAO->getNextId(); //genera el siguiente ID
    $company = new Company($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active);   
    $this->CompanyDAO->addCompany($company);   
    $this->ShowAddView();
  }
       
  public function DeleteCompany($companyId){
    $this->CompanyDAO->deleteCompanyById($companyId);
    $this->ShowAdminListView();
  }

  /**
   * * creo que pasandole por parametro solo $company funcionaria
   * * se tendria que modificar el metodo en CompanyDAO & ICompanyDAO
   * * despues de $this->deleteCompanyById($companyId);(linea 77) agregar addCompany
   */
  public function UpdateCompany($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active){
    $this->CompanyDAO->updateCompany($companyId, $companyName, $email,$phoneNumber,$address,$city,$country, $totalEmployees, $companyInfo,$active);
    $this->ShowAdminListView();
  }

}

?>
