<?php

namespace DAO;

use DAO\ICompanyDAO as ICompanyDAO;
use Models\Company as Company;

class CompanyDAO implements ICompanyDAO {

  private $companyList = array();

  public function addCompany(Company $newCompany) {
    $this->retrieveData();
    $newCompany->setCompanyId($this->getNextId()); 
    array_push($this->companyList, $newCompany);
    $this->saveData();
  }

  public function getNextId() {
    $id = 0;

    foreach($this->companyList as $company) {
        $id = ($company->getCompanyId() > $id) ? $company->getCompanyId() : $id;            
    }
    return $id + 1;
}

  public function getAllCompany() {
    $this->retrieveData();
    return $this->companyList;
  }

  public function getCompanyById($companyId) {
    $this->retrieveData();
    $targetCompany = null;

    foreach($this->companyList as $company) {
      if($company->getCompanyId() == $companyId) {
        $targetCompany == $companyId;
      }
    }
    return $companyId;
  }

  public function getCompanyByName($companyName) {
    $this->retrieveData();
    $targetCompany = null;

    foreach($this->companyList as $company) {
      if($company->getCompanyName() == $companyName) {
        $targetCompany == $companyName;
      }
    }
    return $companyName;
  }

  public function deleteCompanyById($companyId) {
    $this->retrieveData();
    $newList = array();

    foreach($this->companyList as $company) {
      if($companyId->getCompanyId() != $companyId) {
        array_push($newList, $company);
      }
    }

    $this->companyList = $newList;
    $this->saveData();
  }

  public function updateCompany($companyId, $companyName, $email, $phoneNumber, $address, $city, $country, $totalEmployees, $companyInfo, $active) {
    $this->retrieveData();
    
    foreach($this->companyList as $company) {
      if($company->getCompanyId == $companyId) {
        $this->deleteCompanyById($companyId);
        $newCompany = new Company(
          $companyId,
          $companyName,
          $email,
          $phoneNumber,
          $address,
          $city,
          $country,
          $totalEmployees,
          $companyInfo,
          $active
        );

        array_push($this->companyList, $newCompany);
      }
    }
    $this->saveData();
  }

  private function retrieveData() {
    $this->companyList = array();

    if(file_exists('Data/companies.json')) {
      $jsonContent = file_get_contents('Data/companies.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $valuesArray) {
        $company = new Company(
          $valuesArray["companyId"],
          $valuesArray["companyName"],
          $valuesArray["email"],
          $valuesArray["phoneNumber"],
          $valuesArray["address"],
          $valuesArray["city"],
          $valuesArray["country"],
          $valuesArray["totalEmployees"],
          $valuesArray["companyInfo"],
          $valuesArray["active"]
        );

        array_push($this->companyList, $company);
      }
    }
  }

  private function saveData() {
    $arrayToEncode = array();

    foreach ($this->companyList as $company) {
      $valuesArray["companyId"] = $company->getCompanyId();
      $valuesArray["companyName"] = $company->getCompanyId();
      $valuesArray["email"] = $company->getEmail();
      $valuesArray["phoneNumber"] = $company->getPhoneNumber();
      $valuesArray["address"] = $company->getAddress();
      $valuesArray["city"] = $company->getCity();
      $valuesArray["country"] = $company->getCountry();
      $valuesArray["totalEmployees"] = $company->getTotalEmployees();
      $valuesArray["companyInfo"] = $company->getCompanyInfo();
      $valuesArray["active"] = $company->getActive();

      array_push($arrayToEncode, $valuesArray);
    }

    $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
    file_put_contents('Data/companies.json', $jsonContent);
  } 

}

?>
