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
                    <th>Application</th>

                </thead>
                <tbody>
                    <?php



                    foreach ($jobApplicationList as $jobApplication) {
                    ?>
                        <td><?php echo $jobApplication->getJobApplicationId(); ?></td>
                        <td><?php echo $jobApplication->getCompanyId(); ?></td>
                        <td><?php echo $jobApplication->getStudentId(); ?></td>
                        <td><?php echo $jobApplication->getActive(); ?></td>

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
                    ?>
                </tbody>

            </table>
        </div>

    </section>
</main>