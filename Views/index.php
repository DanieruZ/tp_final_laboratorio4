<?php
require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">index</h2>



               <?php
             
             use Models\Student as Student;
             $studentList = array();


               $apiStudent = curl_init(API_URL . 'Student');
               curl_setopt($apiStudent,CURLOPT_URL, API_URL);

               curl_setopt($apiStudent, CURLOPT_HTTPHEADER, array('x-api-key: ' . API_KEY));
               curl_setopt($apiStudent, CURLOPT_RETURNTRANSFER, true);
               // Envio de la peticiÃ³n.
               $response = curl_exec($apiStudent);
               $this->studentList = array();

               //die(var_dump($response));

               
               $arrayToDecode = ($response) ? json_decode($response, true) : array();
         
               

                foreach($arrayToDecode as $valuesArray) {
                    $student = new Student(
                    $valuesArray["studentId"], 
                    $valuesArray["careerId"], 
                    $valuesArray["firstName"], 
                    $valuesArray["lastName"], 
                    $valuesArray["dni"], 
                    $valuesArray["fileNumber"], 
                    $valuesArray["gender"], 
                    $valuesArray["birthDate"], 
                    $valuesArray["email"], 
                    $valuesArray["phoneNumber"], 
                    $valuesArray["active"]);
                    
                    array_push($this->studentList, $student);
               }

                   // var_dump($this->studentList);

               $arrayToEncode = array();
    
        foreach($this->studentList as $student){
          $valuesArray["studentId"] = $student->getStudentId();
          $valuesArray["careerId"] = $student->getCareerId();
          $valuesArray["firstName"] = $student->getFirstName();
          $valuesArray["lastName"] = $student->getLastName();
          $valuesArray["dni"] = $student->getDni();
          $valuesArray["fileNumber"] = $student->getFileNumber();
          $valuesArray["gender"] = $student->getGender();
          $valuesArray["birthDate"] = $student->getBirthDate();
          $valuesArray["email"] = $student->getEmail();
          $valuesArray["phoneNumber"] = $student->getPhoneNumber();
          $valuesArray["active"] = $student->getActive();
    
          array_push($arrayToEncode, $valuesArray);
          }
          $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents('Data/students.json', $jsonContent);
               //var_dump($arrayToEncode);
             
               ?>


          </div>
     </section>
</main>