<?php

?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Offer</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/AddJobOffer" method="post" class="bg-light p-5">
                    <div class="col">
                         <div class="col-lg-4">
                              <div class="form-group">                             
                                   <select name="companyId" name= "companyName" required class="form-control form-control-ml">
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
                              <textarea type="text" name="description" maxlength="200" class="form-control form-control-ml" required value="" placeholder="Descripción"></textarea>
                         </div>
                         <div class="col-lg-4">
                         </div>






                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Admin">Back to Main</a>
               </form>
          </div>
     </section>
</main