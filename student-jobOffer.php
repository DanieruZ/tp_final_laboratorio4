<?php

use DAO\jobPositionDAO as jobPositionDAO;

$jobPositionDao = new jobPositionDAO();
$jobPositionList = $jobPositionDao->getAllJobPosition()
?>



<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">JobApplication's List</h2>
            <table class="table bg-light">
                <thead class="bg-primary text-white">
                    <th>companyName</th>
                    <th>Job Position</th>
                    <th>description</th>                   
                    <th>Application</th>

                </thead>
                <tbody>

                    <?php                 
                

                    foreach ($jobOfferList as $jobOffer) {

                        foreach ($jobPositionList as $jobPosition) {
                            if ($jobOffer->getId_jobOffer() == $jobPosition->getJobPositionId()) {
                    ?>
                                <tr>
                                    <td><?php echo $jobOffer->getCompanyName(); ?></td>
                                    <td><?php echo $jobPosition->getDescription(); ?></td>
                                    <td><?php echo $jobOffer->getJobOffer_description(); ?></td>      
                                    <td>
                                        <button type="submit" name="btn" class="btn btn-outline-primary">
                                            
                                        <a href="<?php if (isset($jobOffer)) {echo FRONT_ROOT . "JobOffer/Application/" . $jobOffer->getId_jobOffer();}; ?>">Applicate</a>
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