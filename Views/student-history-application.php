<?php

use DAO\jobPositionDAO as jobPositionDAO;
use DAO\jobApplicationDAO as jobApplicationDAO;
use DAO\jobOfferDAO as jobOfferDAO;
use Models\JobPosition as JobPosition;
use Models\JobApplication as JobApplication;
use Models\JobOffer as JobOffer;


$jobOffer = new jobOffer();
$JobApplication = new JobApplication();
$jobOfferDAO = new jobOfferDAO();
$jobPositionDao = new jobPositionDAO();
$jobApplicationDAO = new jobApplicationDAO();
$jobOfferList = $jobOfferDAO->getAllJobOffer();
$jobApplicationList = $jobApplicationDAO->getJoApplicationByStudent();
$jobPositionList = $jobPositionDao->getAllJobPosition();





?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">History Application</h2>
            <table class="table bg-light">
                <thead class="bg-primary text-white">
                    <th>Company Name</th>
                    <th>JobPosition</th>
                    <th>Description</th>

                </thead>
                <tbody>
                    <?php


                    foreach ($jobOfferList as $jobOffer) {
                        foreach ($jobApplicationList as $jobApplication) {
                            foreach ($jobPositionList as $jobPosition) {
                                if ($_SESSION['student']->getStudentId() == $jobOffer->getStudent_id()) {
                                    if ($jobOffer->getStudent_id() == $jobApplication->getStudentId()) {
                                        if ($jobPosition->getJobPositionId() == $jobOffer->getJobPosition_id()) {

                    ?>
                                            <tr>
                                                <td><?php echo $jobOffer->getCompanyName(); ?></td>
                                                <td><?php echo $jobPosition->getDescription(); ?></td>
                                                <td><?php echo $jobOffer->getJobOffer_description(); ?></td>
                                            </tr>
                    <?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </section>
</main>