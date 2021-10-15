<?php

?>

<head>
    <title>Update Company</title>
</head>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">update <?php echo $company->getCompanyName(); ?></h2>
            <form action="<?php echo FRONT_ROOT ?>Company/UpdateCompany" method="post" class="bg-light-alpha p-5">
                <div class="col">
                    <input type="hidden" name="" value="true">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="companyId">companyId</label>
                           <input type="hidden" name="companyId" value="<?php echo $company->getCompanyId(); ?>">
                           <label for="companyName">companyName</label>
                            <input type="text" name="companyName" value="<?php echo $company->getCompanyName(); ?>" class="form-control" Required>
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $company->getEmail(); ?>" class="form-control" Required>
                            <label for="phoneNumber">phoneNumber</label>
                            <input type="text" name="phoneNumber" value="<?php echo $company->getPhoneNumber(); ?>" class="form-control" Required>
                            <label for="address">address</label>
                            <input type="text" name="address" value="<?php echo $company->getAddress(); ?>" class="form-control" Required>
                            <label for="city">city</label>
                            <input type="text" name="city" value="<?php echo $company->getCity(); ?>" class="form-control" Required>
                            <label for="country">country</label>
                            <input type="text" name="country" value="<?php echo $company->getCountry(); ?>" class="form-control" Required>
                            
                            <label for="totalEmployees">totalEmployees</label>
                            <input type="text" name="totalEmployees" value="<?php echo $company->getTotalEmployees(); ?>" class="form-control" Required>
                            
                            <label for="companyInfo">companyInfo</label>
                            <input type="text" name="companyInfo" value="<?php echo $company->getCompanyInfo(); ?>" class="form-control" Required>
                            
                            <label for="active">active</label>
                            <input type="text" name="active" value="<?php echo $company->getActive(); ?>" class="form-control" Required>
                            
                        </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-dark ml-auto d-block">Add</button>
                <a href="<?php echo FRONT_ROOT ?>Company/ShowListViewAdmin">Back to Main</a>
            </form>
        </div>
    </section>
</main