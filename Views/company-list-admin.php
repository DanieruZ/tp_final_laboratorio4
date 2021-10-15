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
                              foreach($companyList as $company)
                              {
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
                                                
                                             </td>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
                    
               </table>
          </div>

     </section>
</main>
