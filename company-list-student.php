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
                         <th>Country </th>
                         <th>Total Employees </th>
                         <th>Description</th>
                        


                    </thead>
                    <tbody>
                         <?php
                         if (isset($companyList)) {
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
                                   
                                  
                              </tr>
                         <?php
                         }
                    }
                         ?>
                    </tbody>

               </table>
          </div>

     </section>
</main>