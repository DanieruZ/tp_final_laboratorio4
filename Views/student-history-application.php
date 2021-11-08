<?php

use DAO\jobPositionDAO as jobPositionDAO;
use DAO\jobApplicationDAO as jobApplicationDAO;
use DAO\jobOfferDAO as jobOfferDAO;
use Models\JobPosition as JobPosition;
use Models\JobApplication as JobApplication;

$jobOfferDAO = new jobOfferDAO();
$jobPositionDao = new jobPositionDAO();
$jobApplicationDAO = new jobApplicationDAO();
$jobOfferList = $jobOfferDAO->getAllJobOfferbyName();
$jobApplicationList = $jobApplicationDAO->getJoApplicationByStudent();
$jobPositionList = $jobPositionDao->getAllJobPosition();

//die(var_dump($jobApplicationList));



?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">History Application</h2>
            <table class="table bg-light">
                <thead class="bg-dark text-white">
                    <th>jobOfferId</th>
                    <th>companyName</th>
                    <th>description</th>
                    <th>UnApply</th>

                </thead>
                <tbody>


                    <div class="row">
                        <div class="col-lg-4">                            
                            <input readonly name="companyName" class="form-control form-control-ml" value=" <?php echo $jobOffer->getCompanyName(); ?>">
                        </div>
                        <tr>
                            <td>

                                <button type="submit" name="btnChange" class="btn btn-danger">
                                    <a href="<?php if (isset($jobOffer)) {
                                                    echo FRONT_ROOT . "JobOffer/changeJobOfferActiveById/" . $jobOffer->getJobOfferId();
                                                }; ?>">unapply</a>
                                </button>
                            </td>
                        </tr>

                </tbody>

            </table>
        </div>

    </section>
</main>