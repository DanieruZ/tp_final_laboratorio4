<?php
use DAO\JobOfferDAO as JobOfferDAO;
use Models\JobOffer as JobOffer;


$JobOfferDAO = new JobOfferDAO();
$jobOffer = $JobOfferDAO->getJobofferById($id_jobOffer);




//var_dump($jobOffer->getId_jobOffer());

?>

<head>
    <title>Update JobOffer</title>
</head>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">update <?php echo $jobOffer->getCompanyName(); ?></h2>
            <form action="<?php echo FRONT_ROOT ?>JobOffer/Update" method="POST" class="bg-light-alpha p-5">
                <div class="col">                   
                    <div class="col-lg-4">
                        <div class="form-group">                       
                            <input type="hidden" name="jobOfferId" value="<?php echo $jobOffer->getId_jobOffer(); ?>">
                           <label >company_id</label>
                            <input type="number" name="companyId" value="<?php echo $jobOffer->getCompany_id(); ?>" class="form-control" Required>
                            <label for="jobPositionId">jobPosition_id</label>
                            <input type="number" name="jobPositionId" value="<?php echo $jobOffer->getJobPosition_id(); ?>" class="form-control" Required>
                            <label for="companyName">companyName</label>
                            <input type="text" name="companyName" value="<?php echo $jobOffer->getCompanyName(); ?>" class="form-control" Required>
                            <label for="jobOffer_description">jobOffer_description</label>
                            <input type="text" name="jobOffer_description" value="<?php echo $jobOffer->getJobOffer_description(); ?>" class="form-control" Required>
                            <label for="limitDate">limit_date</label>
                            <input type="date" name="limitDate" value="<?php echo $jobOffer->getLimit_date(); ?>" class="form-control" Required>
                            <label for="active">active</label>
                            <input type="text" name="active" value="<?php echo $jobOffer->getActive(); ?>" class="form-control" Required>                            
                            <label for="student_id">student_id</label>
                            <input type="number" name="student_id" value="<?php echo $jobOffer->getStudent_id(); ?>" class="form-control" Required>
                            
                            
                            
                        </div>
                    </div>
                    
                </div>
                <button type="submit" name="" class="btn btn-primary btn-lg btn-block">Save</button>
                <a href="<?php echo FRONT_ROOT ?>JobOffer/ShowJobOfferListAdminView">Back to Main</a>
            </form>
        </div>
    </section>
</main


   
                      
