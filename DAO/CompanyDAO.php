<?php

namespace DAO;

use DAO\ICompanyDAO as ICompanyDAO;
use Models\Company as Company;
use DAO\Connection as Connection;



class CompanyDAO implements ICompanyDAO
{

  private $companyList = array();
  private $connection;
  private $tableName = "company";

  public function addCompany(Company $company)
  {

    try {

      $sql = "INSERT INTO  company (companyName, email, phoneNumber, address, city, country, totalEmployees, companyInfo, active) 
                VALUES ( :companyName, :email, :phoneNumber, :address, :city, :country, :totalEmployees, :companyInfo, :active);";

      $parameters["companyName"] = $company->getCompanyName();
      $parameters["email"] = $company->getEmail();
      $parameters["phoneNumber"] = $company->getPhoneNumber();
      $parameters["address"] = $company->getAddress();
      $parameters["city"] = $company->getCity();
      $parameters["country"] = $company->getCountry();
      $parameters["totalEmployees"] = $company->getTotalEmployees();
      $parameters["companyInfo"] = $company->getCompanyInfo();
      $parameters["active"] = $company->getActive();



      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function getNextId()
  {
    $id = 0;
    foreach ($this->companyList as $company) {
      $id = ($company->getCompanyId() > $id) ? $company->getCompanyId() : $id;
    }
    return $id + 1;
  }


  public function getAllCompany()
  {
    try {
      $companyList = array();

      $sql = "SELECT * FROM " . $this->tableName;

      $this->connection = Connection::GetInstance();

      $toCompany = $this->connection->Execute($sql);

      foreach ($toCompany as $row) {

        $company = new Company();
        $company->setCompanyId($row["companyId"]);
        $company->setCompanyName($row["companyName"]);
        $company->setEmail($row["email"]);
        $company->setPhoneNumber($row["phoneNumber"]);
        $company->setAddress($row["address"]);
        $company->setCity($row["city"]);
        $company->setCountry($row["country"]);
        $company->setTotalEmployees($row["totalEmployees"]);
        $company->setCompanyInfo($row["companyInfo"]);
        $company->setActive($row["active"]);

        array_push($companyList, $company);
      }

      return $companyList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  // Se duerme para utilizar la BD
  // public function getAllCompany() {
  // $this->retrieveData();
  // return $this->companyList;
  // }

  public function getCompanyById($companyId)
  {
    $this->retrieveData();
    $targetCompany = null;

    foreach ($this->companyList as $company) {
      if ($company->getCompanyId() == $companyId) {
        $targetCompany == $companyId;
      }
    }
    return $companyId;
  }

  public function getCompanyByName($companyName)
  {
    $this->retrieveData();
    $targetCompany = null;

    foreach ($this->companyList as $company) {
      if ($company->getCompanyName() == $companyName) {
        $targetCompany == $companyName;
      }
    }
    return $companyName;
  }


  public function getCompanyNameById($companyId) {
    $companyList = $this->getAllCompany();

    foreach ($companyList as $company) {
      if ($company->getCompanyId() == $companyId) {
        $companyName = $company->getCompanyName();
      }
    }
    return $companyName;
  }

  
  public function deleteCompanyById($companyId)
  {
    $sql = "DELETE FROM company WHERE companyId=:companyId";
    $parameters['companyId'] = $companyId;


    try {
      $this->connection = Connection::getInstance();
      return $this->connection->executeNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function updateCompany($companyId, $companyName, $email, $phoneNumber, $address, $city, $country, $totalEmployees, $companyInfo, $active)
  {
    $this->retrieveData();

    foreach ($this->companyList as $company) {
      if ($company->getCompanyId() == $companyId) {
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

  private function retrieveData()
  {
    $this->companyList = array();

    if (file_exists('Data/companies.json')) {
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

  private function saveData()
  {
    $arrayToEncode = array();

    foreach ($this->companyList as $company) {
      $valuesArray["companyId"] = $company->getCompanyId();
      $valuesArray["companyName"] = $company->getCompanyName();
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
