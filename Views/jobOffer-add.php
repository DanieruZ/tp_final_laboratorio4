<?php
require_once "nav-admin.php";
?>
<head>
     <title>New Offer</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Offer</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/AddJobOffer" method="post" class="bg-light p-5">
                    <div class="col">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="description">Description</label>
                                   <input type="text" name="description" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="NameCompany">Name Company</label>
                                   <input type="text" name="NameCompany" value="" class="form-control" Required>
                              </div>
                         </div>
                         
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Admin">Back to Main</a>
               </form>
          </div>
     </section>
</main