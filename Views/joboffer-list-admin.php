<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">JobOffer List</h2>
            <table class="table bg-light">
                <thead class="bg-dark text-white">
                    <th>jobOfferId</th>
                    <th>companyId</th>
                    <th>companyName</th>
                    <th>jobPositionId</th>
                    <th>studentId</th>
                    <th>description</th>
                    <th>adminId</th>
                    <th>active</th>
                    <th>Change Status</th>                   

                </thead>
                <tbody>
                    <?php
                   
                        foreach ($jobOfferList as $jobOffer) {
                    ?>
                    <tr>
                    <td><?php echo $jobOfferId = $jobOffer->getJobOfferId(); ?></td>
                    <td><?php echo $jobOffer->getCompanyId(); ?></td>
                        <td><?php echo $jobOffer->getCompanyName(); ?></td>
                        <td><?php echo $jobOffer->getJobPositionId(); ?></td>
                        <td><?php echo $jobOffer->getStudentId(); ?></td>
                        <td><?php echo $jobOffer->getDescriptionJobOffer(); ?></td>
                        <td><?php echo $jobOffer->getAdminId(); ?></td>                       
                        <td><?php echo $jobOffer->getActive(); ?></td>                         
                      
                        <td>
                            <button type="submit" name="btnRemove" class="btn btn-danger">
                                <a href="<?php if (isset($jobOffer)) {
                                    echo FRONT_ROOT . "JobOffer/DeleteJobOffer/" . $jobOffer->getJobOfferId();}; ?>">Delete</a>
                            </button>                            
                        
                       
                            <button type="submit" name="btnChange" class="btn btn-danger">
                                <a href="<?php if (isset($jobOffer)) {
                                                        echo FRONT_ROOT . "JobOffer/changeJobOfferActiveById/" . $jobOffer->getJobOfferId();}; ?>">Active</a>
                            </button>                            
                        
                       
                            <button type="submit" name="btnChange" class="btn btn-danger">
                                <a href="<?php if (isset($jobOffer)) {
                                    echo FRONT_ROOT . "JobOffer/changeJobOfferInactiveById/" . $jobOffer->getJobOfferId();}; ?>">Inactive</a>
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