<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container-fluid">
               <h2 class="mb-4">Company's List</h2>
               <table class="table bg-light">
               <thead class="bg-primary text-white">
                    <th>Name</th>
                    <th>Email</th>
                    <th>PhoneNumber</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Total Employees</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Options</th>


                    </thead>
                    <tbody>
                         <?php                        
                         foreach ($companyList as $company) {
                         ?>
                              <tr>
                                   <td><?php echo $company->getCompanyName(); ?></td>
                                   <td><?php echo $company->getEmail(); ?></td>
                                   <td><?php echo $company->getPhoneNumber(); ?></td>
                                   <td><?php echo $company->getAddress(); ?></td>
                                   <td><?php echo $company->getCity(); ?></td>
                                   <td><?php echo $company->getCountry(); ?></td>
                                   <td><?php echo $company->getTotalEmployees(); ?></td>
                                   <td><?php echo $company->getCompanyInfo(); ?></td>
                                   <td><?php echo $company->getActive(); ?></td>
                                   <td>
                                        
                                        <button type="submit" name="btnRemove"  class="btn btn-outline-danger">
                                        <a href= "<?php if(isset($company)) {echo FRONT_ROOT . "Company/DeleteCompany/" . $company->getCompanyId();}; ?>">Delete</a>
                                        </button>
                                        <button type="submit" name="btnUpdate" class="btn btn-outline-primary">
                                            <a href="<?php if (isset($company)) {
                                                            echo FRONT_ROOT . "Company/ShowCompanyListUpdateAdminView/" . $company->getCompanyId();
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