<?php
require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">index</h2>



               <?php

               use Models\Student as Student;


               $apiStudent = curl_init(API_URL . 'Student');
               curl_setopt($apiStudent,CURLOPT_URL, API_URL);

               curl_setopt($apiStudent, CURLOPT_HTTPHEADER, array('x-api-key: ' . API_KEY));
               curl_setopt($apiStudent, CURLOPT_RETURNTRANSFER, true);
               // Envio de la petición.
               $response = curl_exec($apiStudent);

                var_dump($response);

               $jsonContent = json_decode($response, true);
               // var_dump($arrayToDecode[0]['active']);



               $options = array(
                    'http' => array(
                         'method' => "GET",
                         'header' => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08"
                    )
               );

               $context = stream_context_create($options);

               $response = file_get_contents('https://utn-students-api.herokuapp.com/api/Student', false, $context);


               $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

               foreach ($arrayToDecode as $valuesArray) {
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
                         $valuesArray["active"]
                    );

                    array_push($studentList, $student);
               }
             //  var_dump($studentList);
               ?>


          </div>
     </section>
</main>;