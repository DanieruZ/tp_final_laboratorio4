<?php

use DAO\jobPositionDAO as jobPositionDAO;
use DAO\jobApplicationDAO as jobApplicationDAO;
use DAO\jobOfferDAO as jobOfferDAO;
use Models\JobPosition as JobPosition;

$jobOfferDAO = new jobOfferDAO();
$jobPositionDao = new jobPositionDAO();
$jobApplicationDAO = new jobApplicationDAO();
$jobOfferList = $jobOfferDAO->getAllJobOfferbyName();
$jobApplicationList = $jobApplicationDAO->getAllJoApplicationHisotory();
$jobPositionList = $jobPositionDao->getAllJobPosition()



?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">History Application</h2>
            <table class="table bg-light">
                <thead class="bg-dark text-white">
                    <th>companyName</th>
                    <th>Job Position</th>
                    <th>description</th>
                    <th>active</th>
                    <th>UnApply</th>

                </thead>
                <tbody>
                    <?php
    var_dump($jobPosition->getActive();



                    foreach ($jobOfferList as $jobOffer) {

                        foreach ($jobPositionList as $jobPosition) {
                            if ($jobOffer->getJobPositionId() == $jobPosition->getJobPositionId()) {

                    ?>
                                <td><?php echo $jobOffer->getCompanyName(); ?></td>
                                <td><?php echo $jobPosition->getDescription(); ?></td>
                                <td><?php echo $jobOffer->getDescriptionJobOffer(); ?></td>
                                <td><?php echo $jobPosition->getActive(); ?></td>

                                <td>

                                    <button type="submit" name="btnChange" class="btn btn-danger">
                                        <a href="<?php if (isset($jobOffer)) {
                                                        echo FRONT_ROOT . "JobOffer/changeJobOfferInactiveById/" . $jobOffer->getJobOfferId();
                                                    }; ?>">unapply</a>
                                    </button>
                                </td>
                                </tr>
                    <?php
                            }
                        }
                    }

                    ?>
                </tbody>

            </table>
        </div>

    </section>
</main>