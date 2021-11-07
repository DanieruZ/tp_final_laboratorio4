<?php

use DAO\jobPositionDAO as jobPositionDAO;

$jobPositionDao = new jobPositionDAO();
$jobPositionList = $jobPositionDao->getAllJobPosition()
?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">Job Application List</h2>
            <table class="table bg-light">
                <thead class="bg-dark text-white">
                    <th>companyName</th>
                    <th>Job Position</th>
                    <th>description</th>                   
                    <th>Application</th>

                </thead>
                <tbody>

                <h4 style="color: black">
                    
                </h4>
                    <?php
                 

                    foreach ($jobOfferList as $jobOffer) {

                        foreach ($jobPositionList as $jobPosition) {
                            if ($jobOffer->getJobPositionId() == $jobPosition->getJobPositionId()) {
                    ?>
                                <tr>
                                    <td><?php echo $jobOffer->getCompanyName(); ?></td>
                                    <td><?php echo $jobPosition->getDescription(); ?></td>
                                    <td><?php echo $jobOffer->getDescriptionJobOffer(); ?></td>                               


                                    
                                    
                                    <td>
                                        <button type="submit" name="btn" class="btn btn-danger">
                                            
                                            <a href="<?php if (isset($jobOffer)) {echo FRONT_ROOT . "JobOffer/Application/" . $jobOffer->getJobOfferId();}; ?>">Applicate</a>
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