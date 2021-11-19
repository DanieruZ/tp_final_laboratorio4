<?php

namespace Controllers;

use DAO\JobOfferDAO as JobOfferDAO;
use DAO\CompanyDAO as CompanyDAO;
use Models\JobOffer as JobOffer;
use Models\Student as Student;
use DAO\StudentDAO as StudentDAO;
use DAO\JobPositionDAO as JobPositionDAO;
use DAO\JobApplicationDAO as JobApplicationDAO;
use Utils\Utils as Utils;

class JobOfferController
{

  // private $jobOffer;
  private $JobOfferDAO;
  private $CompanyDAO;
  private $JobPositionDAO;
  private $JobApplicationDAO;
  private $StudentDAO;

  public function __construct()
  {
    $this->JobOfferDAO = new JobOfferDAO();
    $this->CompanyDAO = new CompanyDAO();
    $this->JobPositionDAO = new JobPositionDAO();
    $this->JobApplicationDAO = new JobApplicationDAO();
    $this->StudentDAO = new StudentDAO();
  }

  public function ShowJobOfferListAdminView() {
    Utils::checkAdminSession();
    $jobOfferList = $this->JobOfferDAO->getAllJobOffer();
    require_once(VIEWS_PATH . "nav-admin.php");
    require_once(VIEWS_PATH . "joboffer-list-admin.php");
  }

  public function ShowJobOfferListApplicationAdminView() {
    Utils::checkAdminSession();
    $jobOfferList = $this->JobOfferDAO->getAllJobOffer();
    require_once(VIEWS_PATH . "nav-admin.php");
    require_once(VIEWS_PATH . "joboffer-list-application.php");
  }

  public function ShowJobOfferListUpdateAdminView($id_jobOffer) {
    Utils::checkAdminSession();
    $jobOfferList = $this->JobOfferDAO->getJobofferById($id_jobOffer);
    require_once(VIEWS_PATH . "nav-admin.php");
    require_once(VIEWS_PATH . "joboffer-update-admin.php");
  }

  public function ShowJobOfferListStudentView() {
    Utils::checkStudentSession();
    $jobOfferList = $this->JobOfferDAO->getAllJobOfferbyActive();
    require_once(VIEWS_PATH . "nav-student.php");
    require_once(VIEWS_PATH . "student-jobOffer.php");
  }

  public function ShowAddJobOfferView() {
    Utils::checkAdminSession();
    $companyList = $this->CompanyDAO->getAllCompany();
    $jobPositionList = $this->JobPositionDAO->getAllJobPosition();
    require_once(VIEWS_PATH . "nav-admin.php");
    require_once(VIEWS_PATH . "jobOffer-add.php");
  }

  public function ShowApplicationView() {
    Utils::checkStudentSession();
    $jobOfferList = $this->JobOfferDAO->getAllJobOfferbyActive();
    $jobPositionList = $this->JobPositionDAO->getAllJobPositionByName();
    require_once(VIEWS_PATH . "nav-student.php");
    require_once(VIEWS_PATH . "student-jobOffer.php");
  }

  public function ShowHistoryApplicationView() {
    Utils::checkStudentSession();
    $jobOfferList = $this->JobOfferDAO->getAllJobOfferbyActive();
    $jobPositionList = $this->JobPositionDAO->getAllJobPositionByName();
    $jobApplicationList = $this->JobApplicationDAO->getAllJoApplicationHisotory();
    require_once(VIEWS_PATH . "nav-student.php");
    require_once(VIEWS_PATH . "student-history-application.php");
  }


  public function AddJobOffer($companyId, $jobPositionId, $jobOffer_description, $limitDate) {
    Utils::checkAdminSession();
    try {
      if ($limitDate >= date("Y-m-d")) {         
        $jobOffer = new JobOffer();       
        $jobOffer->setCompany_id($companyId);
        $jobOffer->setJobPosition_id($jobPositionId);        
        $jobOffer->setCompanyName($this->CompanyDAO->getCompanyNameById($companyId));
        $jobOffer->setJobOffer_description($jobOffer_description);
        $jobOffer->setLimit_date($limitDate);
        $jobOffer->setActive(1);
        $jobOffer->setStudent_id(0);      
        $this->JobOfferDAO->addJobOffer($jobOffer);
        $this->ShowAddJobOfferView();
      } 
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function DeleteJobOffer($jobOfferId) {
    Utils::checkAdminSession();
    $this->JobOfferDAO->deleteJobOfferById($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function CancellJobOffer($jobOfferId) {
    Utils::checkAdminSession();
    $this->JobOfferDAO->cancellJobOfferById($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function ChangeJobOfferActiveById($jobOfferId) {
    Utils::checkAdminSession();
    $this->JobOfferDAO->changeJobOfferActive($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function ChangeJobOfferInactiveById($jobOfferId) {
    Utils::checkAdminSession();
    $this->JobOfferDAO->changeJobOfferInactive($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function Application($jobOfferId) {
    Utils::checkStudentSession();   
    try {
      $user = $_SESSION['student'];
      $studentId = $user->getStudentId();      
 
      $this->JobOfferDAO->AddStudentApplication($studentId,$jobOfferId);   
         
      $SubscribeSuccess = true;     

      $jobOffer = $this->JobOfferDAO->getJobOfferByApplication($jobOfferId);

      $this->JobOfferDAO->AddStudentApplicationx2($jobOffer,$jobOfferId,$studentId);  
     
     
     
      $this->ShowApplicationView();
      //require_once(VIEWS_PATH . "student-jobOffer-show.php"); 
  } catch (\PDOException $ex) {
    throw $ex;
  }
    
  } 



  public function Update($jobOfferId, $companyId, $jobPositionId, $companyName, $jobOffer_description, $limitDate, $active, $student_id)
  {
    Utils::checkAdminSession();
    try {
      $companies = $this->CompanyDAO->getAllCompany();
      $jobPositions = $this->JobPositionDAO->getAllActiveCareer();
      $jobOffers = $this->JobOfferDAO->getJobofferById($jobOfferId);
     
      $students=$this->StudentDAO->getAllStudent();         
        
          $modifiedJobOffer = new JobOffer();
          $modifiedJobOffer->setId_jobOffer($jobOfferId);
          $modifiedJobOffer->setCompany_id($companyId);
          $modifiedJobOffer->setJobPosition_id($jobPositionId);
          $modifiedJobOffer->setCompanyName($companyName);
          $modifiedJobOffer->setJobOffer_description($jobOffer_description);
          $modifiedJobOffer->setLimit_date($limitDate);
          $modifiedJobOffer->setActive($active);
          $modifiedJobOffer->setStudent_id($student_id);        
         
          $this->JobOfferDAO->updateJobOffer($modifiedJobOffer);         
          $jobOffer=$this->JobOfferDAO->getJobofferById($jobOfferId);
          
              
      $this->ShowJobOfferListAdminView();
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }
}
