<?php
require_once "nav-admin.php";
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>companyId</th>
                         <th>companyName</th>
                         <th>email</th>
                         <th>phoneNumber</th>
                         <th>address</th>
                         <th>city</th>
                         <th>country </th>
                         <th>totalEmployees </th>
                         <th>companyInfo </th>
                         <th>active </th>


                    </thead>
                    <tbody>
                         <?php
                         foreach ($companyList as $company) {
                         ?>
                              <tr>
                                   <td><?php echo $company->getCompanyId(); ?></td>
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
                                        
                                        <button type="submit" name="btnRemove"  class="btn btn-danger">
                                        <a href= "<?php echo FRONT_ROOT ?>Company/DeleteCompany?$id=<?php echo $company->getCompanyId(); ?>">Delete</a>
                                        </button>
                                        <button type="submit" name="update"  class="btn">
                                        <a href= "<?php echo FRONT_ROOT?>Company/ShowUpdateView?$id=<?php echo $company->getCompanyId();?>&$companyName=<?php echo $company->getCompanyName();?>&$email=<?php echo $company->getEmail();?>&$phoneNumber=<?php echo $company->getPhoneNumber();?>&$address=<?php echo $company->getAddress();?>&$city=<?php echo $company->getCity();?>&$country=<?php echo $company->getCountry();?>&$totalEmployees=<?php echo $company->getTotalEmployees();?>&$companyInfo=<?php echo $company->getCompanyInfo();?>&$active=<?php echo $company->getActive();?>">Update</a>
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