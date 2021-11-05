<?php

namespace Controllers;
use Utils\Utils as Utils;
use DAO\JobOfferDAO as JobOfferDAO;
use DAO\CompanyDAO as CompanyDAO;
use Models\JobOffer as JobOffer;
use DAO\StudentDAO as StudentDAO;
use DAO\JobPositionDAO as JobPositionDAO;

class JobOfferController {
        
  private $JobOfferDAO;
  private $CompanyDAO;
  private $JobPositionDAO;

  public function __construct() {
    $this->JobOfferDAO = new JobOfferDAO();
    $this->CompanyDAO = new CompanyDAO;
    $this->JobPositionDAO = new JobPositionDAO;
  }
  
  public function ShowJobOfferListAdminView() {
    require_once(VIEWS_PATH."nav-admin.php");
    $jobOfferList = $this->JobOfferDAO->getAllJobOffer();   
    require_once(VIEWS_PATH."joboffer-list-admin.php");
  }

  public function ShowJobOfferListStudentView() {
    require_once(VIEWS_PATH."nav-student.php");
    $jobOfferList = $this->JobOfferDAO->getAllJobOffer();
    require_once(VIEWS_PATH."joboffer-list-student.php");
  }

  public function ShowAddJobOfferView(){
    require_once(VIEWS_PATH."nav-admin.php");
    $companyList = $this->CompanyDAO->getAllCompany();
   $jobPositionList = $this->JobPositionDAO->getAllJobPosition();
    require_once(VIEWS_PATH."jobOffer-add.php");    
   
}

//Chequear de borrar despues
public function AddFormJobOffer()
{
  Utils::checkAdminSession(); 
    $companyList = $this->CompanyDAO->getAllCompany();
    $jobPositions = $this->JobPositionDAO->getAllJobPosition();
    require_once(VIEWS_PATH . "jobOffer-add.php");
}


  public function AddJobOffer($companyId,$jobPositionId,$description) {  
    Utils::checkAdminSession();    
    //$jobOfferId = $this->JobOfferDAO->getNextId(); //genera el siguiente ID    
    $jobOffer = new JobOffer();   
    $jobOffer->setCompanyId($companyId);
    $jobOffer->setJobPositionId($jobPositionId);    
    $jobOffer->setCompanyName($this->CompanyDAO->getCompanyNameById($companyId));
    $jobOffer->setStudentId(0);
    $jobOffer->setAdminId($_SESSION["admin"]->getAdminId());
    $jobOffer->setDescription($description);
    $jobOffer->setActive(1);   
    
   // die(var_dump($jobOffer->setCompanyName("Buenas")));
    
    $this->JobOfferDAO->addJobOffer($jobOffer);   
    $this->ShowAddJobOfferView();
  }

  public function DeleteJobOffer($jobOfferId){
    $this->JobOfferDAO->deleteJobOfferById($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function changeActiveJobOfferById($jobOfferId){
    $this->JobOfferDAO->changeActiveJobOffer($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function changeInactiveJobOfferById($jobOfferId){
    $this->JobOfferDAO->changeInactiveJobOffer($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }
  
  public function ShowOffer($jobOfferId)
  {
      Utils::checkAdminSession(); 
    //  die(var_dump($this->JobPositionDAO->getAllActiveCareer())); 
      $company = $this->CompanyDAO->getAllCompany();   
       
      $jobPositions = $this->JobPositionDAO->getAllActiveCareer();
     // $jobOffer = $this->jobOfferDAO->getJobOffer();
      //die(var_dump($jobOffer));
     // $student = $this->studentDAO->getStudentById($jobOffer->getStudentId());

      if (isset($_SESSION['admin'])) {
          require_once(VIEWS_PATH . "jobOffer-list-admin.php");
      } else {
          $user = $_SESSION['student'];
          require_once(VIEWS_PATH . "jobOffer-list-student.php");
      }
  }

}

?>
