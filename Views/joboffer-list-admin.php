<?php

namespace Views;

use Models\Student as Student;
use DAO\StudentDAO as StudentDAO;

$studentRepo = new StudentDAO();
$studentList = $studentRepo->getAllStudent();


?>


<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">JobOffer's List</h2>
            <table class="table bg-light">
                <thead class="bg-primary text-white">
                    <th>Company Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Options</th>

                </thead>
                <tbody>
                    <?php

                    foreach ($jobOfferList as $jobOffer) {                     

                        
                                if (($jobOffer->getActive()))
                                    $jobOffer->setActive("Enable");
                                else
                                    $jobOffer->setActive("Disable");

                    ?>
                                <tr>
                                    <td><?php echo $jobOffer->getCompanyName(); ?></td>
                                    <td><?php echo $jobOffer->getJobOffer_description(); ?></td>
                                    <td><?php echo $jobOffer->getActive(); ?></td>

                                    <td>
                                        <button type="submit" name="btnRemove" class="btn btn-outline-danger">
                                            <a href="<?php if (isset($jobOffer)) {
                                                            echo FRONT_ROOT . "JobOffer/DeleteJobOffer/" . $jobOffer->getId_jobOffer();
                                                        }; ?>">Delete</a>
                                        </button>


                                        <button type="submit" name="btnChange" class="btn btn-outline-success">
                                            <a href="<?php if (isset($jobOffer)) {
                                                            echo FRONT_ROOT . "JobOffer/changeJobOfferActiveById/" . $jobOffer->getId_jobOffer();
                                                        }; ?>">Enabled</a>
                                        </button>


                                        <button type="submit" name="btnChange" class="btn btn-outline-warning">
                                            <a href="<?php if (isset($jobOffer)) {
                                                            echo FRONT_ROOT . "JobOffer/changeJobOfferInactiveById/" . $jobOffer->getId_jobOffer();
                                                        }; ?>">Disabled</a>
                                        </button>

                                        <button type="submit" name="btnUpdate" class="btn btn-outline-primary">
                                            <a href="<?php if (isset($jobOffer)) {
                                                            echo FRONT_ROOT . "JobOffer/ShowJobOfferListUpdateAdminView/" . $jobOffer->getId_jobOffer();
                                                        }; ?>">Update</a>
                                        </button>
                                    </td>
                                </tr>
                    <?php
                            }
                        
                    

                    ?>
                </tbody>

            </table>
        </div>

    </section>
</main>