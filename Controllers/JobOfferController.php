<?php

namespace Controllers;

use Utils\Utils as Utils;
use DAO\JobOfferDAO as JobOfferDAO;
use DAO\CompanyDAO as CompanyDAO;
use Models\JobOffer as JobOffer;
use Models\Student as Student;
use DAO\StudentDAO as StudentDAO;
use DAO\JobPositionDAO as JobPositionDAO;
use DAO\JobApplicationDAO as JobApplicationDAO;

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

  public function ShowJobOfferListAdminView()
  {
    require_once(VIEWS_PATH . "nav-admin.php");
    $jobOfferList = $this->JobOfferDAO->getAllJobOffer();
    require_once(VIEWS_PATH . "joboffer-list-admin.php");
  }

  public function ShowJobOfferListStudentView()
  {
    require_once(VIEWS_PATH . "nav-student.php");
    $jobOfferList = $this->JobOfferDAO->getAllJobOffer();
    require_once(VIEWS_PATH . "joboffer-list-student.php");
  }

  public function ShowAddJobOfferView()
  {
    require_once(VIEWS_PATH . "nav-admin.php");
    $companyList = $this->CompanyDAO->getAllCompany();
    $jobPositionList = $this->JobPositionDAO->getAllJobPosition();
    require_once(VIEWS_PATH . "jobOffer-add.php");
  }

  public function ShowApplicationView()
  {
    require_once(VIEWS_PATH . "nav-student.php");
    $jobOfferList = $this->JobOfferDAO->getAllJobOfferbyName();
    $jobPositionList = $this->JobPositionDAO->getAllJobPositionByName();
    require_once(VIEWS_PATH . "student-jobOffer.php");
  }

  public function ShowHistoryApplicationView()
  {
    require_once(VIEWS_PATH . "nav-student.php");
    $jobOfferList = $this->JobOfferDAO->getAllJobOfferbyName();
    $jobPositionList = $this->JobPositionDAO->getAllJobPositionByName();
    $jobApplicationList = $this->JobApplicationDAO->getAllJoApplicationHisotory();
    require_once(VIEWS_PATH . "student-history-application.php");
  }






  public function AddJobOffer($companyId, $jobPositionId, $description)
  {
    Utils::checkAdminSession();
    //$jobOfferId = $this->JobOfferDAO->getNextId(); //genera el siguiente ID    
    $jobOffer = new JobOffer();
    $jobOffer->setCompanyId($companyId);
    $jobOffer->setJobPositionId($jobPositionId);
    $jobOffer->setCompanyName($this->CompanyDAO->getCompanyNameById($companyId));
    $jobOffer->setStudentId(0);
    $jobOffer->setAdminId($_SESSION["admin"]->getAdminId());
    $jobOffer->setdescriptionJobOffer($description);
    $jobOffer->setActive(1);
    // die(var_dump($jobOffer->setCompanyName("Buenas")));    
    $this->JobOfferDAO->addJobOffer($jobOffer);
    $this->ShowAddJobOfferView();
  }

  public function DeleteJobOffer($jobOfferId)
  {
    Utils::checkAdminSession();
    $this->JobOfferDAO->deleteJobOfferById($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function ChangeJobOfferActiveById($jobOfferId)
  {
    Utils::checkAdminSession();
    $this->JobOfferDAO->changeJobOfferActive($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function ChangeJobOfferInactiveById($jobOfferId)
  {
    Utils::checkAdminSession();
    $this->JobOfferDAO->changeJobOfferInactive($jobOfferId);
    $this->ShowJobOfferListAdminView();
  }

  public function Application($jobOfferId)
  {
    Utils::checkStudentSession();
    $jobApplicationChecked = $this->JobApplicationDAO->getJoApplicationByStudent();

      if($jobApplicationChecked == null){

    $studentId = ($_SESSION["student"]->getStudentId());    
    $jobOffer = $this->JobOfferDAO->getJobOfferByApplication($jobOfferId);
    if ($jobOffer->getActive() == 1) {        
      
       $studentId = ($_SESSION["student"]->getStudentId());
       $this->JobOfferDAO->AddStudentApplication($jobOffer, $studentId);    

    }
  }    
    $this->ShowApplicationView();
  }

  

 
}
