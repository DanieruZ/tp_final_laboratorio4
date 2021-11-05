<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Job Offer List</h2>
            <div class="row">
                <form action="<?php echo FRONT_ROOT ?>JobOffer/ShowJobOfferListAdminView" method="GET">
                    <label for="">Career </label>
                    <select name="careerId" class="form-control form-control-ml">
                        <?php
                        echo "<option value=" . 0 . ">Todas</option>";
                        if (isset($careers)) {
                            foreach ($careers as $career) {
                                echo "<option value=" . $career->getCareerId() . ">" . $career->getDescription() . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <button type="submit" name="filter-button" class="btn btn-dark ml-auto d-block">Filtrar</button>
                </form>
            </div>

            <table class="table bg-dark-alpha">
                <thead>
                    
                    <th>companyId</th>
                    <th>companyName</th>
                    <th>jobPositionId</th>
                    <th>studentId</th>
                    <th>description</th>
                    <th>adminId</th>
                    <th>active</th>
                </thead>
                <tbody>
                    <?php
                    if (isset($jobOfferList)) {
                        foreach ($jobOfferList as $jobOffer) {
                            echo  "<tr>";                          
                            echo  "<td>" . $jobOffer->getCompanyId() . "</td>";
                            echo  "<td>" . $jobOffer->getCompanyName() . "</td>";
                            echo  "<td>" . $jobOffer->getJobPositionId() . "</td>";
                            echo  "<td>" . $jobOffer->getStudentId() . "</td>";
                            echo  "<td>" . $jobOffer->getAdminId() . "</td>";
                            echo  "<td>" . $jobOffer->getDescription() . "</td>";
                            echo  "<td>" . $jobOffer->getActive() . "</td>";
                            $jobOfferId = $jobOffer->getJobOfferId();
                            echo "<td><a href=" . FRONT_ROOT . "JobOffer/ShowOffer/" . $jobOfferId . ">+ ACTIVE</a></td>";
                        }
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </section>
</main>