<?php
use DAO\CompanyDAO as CompanyDAO;
use Models\Company as Company;


$CompanyDAO = new CompanyDAO();
$company = $CompanyDAO->getCompanyById($companyId);
//var_dump($company);

?>

<head>
    <title>Update Company</title>
</head>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <form action="<?php echo FRONT_ROOT ?>Company/UpdateCompany" method="POST" class="bg-light p-5">
            <h2 class="mb-4 p-1 bg-primary text-white">Update: <?php echo $company->getCompanyName(); ?></h2>    
            <div class="col">
                    <input type="hidden" name="" value="true">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="companyId"></label>
                           <input type="hidden" name="companyId" value="<?php echo $company->getCompanyId(); ?>">
                           <label for="companyName">Name</label>
                            <input type="text" name="companyName" value="<?php echo $company->getCompanyName(); ?>" class="form-control" Required>
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $company->getEmail(); ?>" class="form-control" Required>
                            <label for="phoneNumber">PhoneNumber</label>
                            <input type="text" name="phoneNumber" value="<?php echo $company->getPhoneNumber(); ?>" class="form-control" Required>
                            <label for="address">Address</label>
                            <input type="text" name="address" value="<?php echo $company->getAddress(); ?>" class="form-control" Required>
                            <label for="city">City</label>
                            <input type="text" name="city" value="<?php echo $company->getCity(); ?>" class="form-control" Required>
                            <label for="country">Country</label>
                            <input type="text" name="country" value="<?php echo $company->getCountry(); ?>" class="form-control" Required>
                            
                            <label for="totalEmployees">TotalEmployees</label>
                            <input type="text" name="totalEmployees" value="<?php echo $company->getTotalEmployees(); ?>" class="form-control" Required>
                            
                            <label for="companyInfo">Description</label>
                            <input type="text" name="companyInfo" value="<?php echo $company->getCompanyInfo(); ?>" class="form-control" Required>
                            
                            <label for="active">Active</label>
                            <input type="text" name="active" value="<?php echo $company->getActive(); ?>" class="form-control" Required>
                            
                        </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-outline-primary ml-auto float-left">Save</button>
                <a class="float-right" href="<?php echo FRONT_ROOT ?>Company/ShowCompanyListAdminView">Back to Main</a>
            </form>
        </div>
    </section>
</main