<?php

namespace DAO;

use Models\Company as Company;

interface ICompanyDAO {

  function addCompany(Company $company);
  function getAllCompany();
  function getCompanyById($companyId);
  function getCompanyByName($companyName);
  function deleteCompanyById($companyId);
  function updateCompany(
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
  
}

?> 
