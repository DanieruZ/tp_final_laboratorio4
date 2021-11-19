<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               
               <form action="<?php echo FRONT_ROOT ?>JobOffer/AddJobOffer" method="post" class="bg-light p-5">
                   <h2 class="mb-4 p-1 bg-primary text-white">Add JobOffer</h2>
                    <div class="col">
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <select name="companyId" name="companyName" required class="form-control form-control-ml">
                                        <option style="color:grey" hidden selected>Company</option>
                                        <?php

                                        if (isset($companyList)) {
                                             foreach ($companyList as $company) {
                                                  echo "<option value=" . $company->getCompanyId() . ">" . $company->getCompanyName() . "</option>";
                                             }
                                        }
                                        ?>
                                   </select>
                              </div>

                         </div>

                         <div class="form-group">
                              <select name="jobPositionId" class="form-control form-control-ml">
                                   <option hidden selected style="color:gray">Position</option>

                                   <?php
                                   if (isset($jobPositionList)) {
                                        foreach ($jobPositionList as $jobPosition) {
                                             echo "<option value=" . $jobPosition->getJobPositionId() . ">" . $jobPosition->getDescription() . "</option>";
                                        }
                                   }
                                   ?>
                              </select>
                         </div>
                         <div class="form-group">
                              <textarea type="text" name="jobOffer_description" maxlength="200" class="form-control form-control-ml" required value="" placeholder="Descripción"></textarea>
                         </div>
                         <div class="col-lg-4">
                         </div>
                         <div class="form-group">

                              <label class="text-center">Fecha límite</label>

                              <input type="date" name="limitDate" class="form-control form-control-ml" required value="" placeholder="Tiempo de finalización">
                         </div>






                    </div>
                    <button type="submit" class="btn btn-outline-primary ml-auto d-block float-left">Add</button>
                    <a class="float-right" href="<?php echo FRONT_ROOT ?>JobOffer/ShowJobOfferListAdminView">Back to Main</a>
               </form>
          </div>
     </section>
</main