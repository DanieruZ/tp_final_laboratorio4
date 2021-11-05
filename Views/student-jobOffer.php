<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <h2 class="mb-4">Job Application List</h2>
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
                          
                        foreach ($jobOfferList as $jobOffer) {                
                    ?>
                    <tr>                    
                        <td><?php echo $jobOffer->getCompanyName(); ?></td>
                        <td><?php echo $jobPosition->getDescription(); ?></td>                      
                        <td><?php echo $jobOffer->getDescription(); ?></td>                                              
                        <td><?php echo $jobOffer->getActive(); ?></td>                         
                      
                        <td>                  
                            <button type="submit" name="btnChange" class="btn btn-danger">
                                <a href="<?php if (isset($jobOffer)) {
                                    echo FRONT_ROOT . "JobOffer/changeJobOfferInactiveById/" . $jobOffer->getJobOfferId();}; ?>">Applicate</a>
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