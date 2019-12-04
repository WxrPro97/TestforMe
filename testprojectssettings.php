<?php
session_start();

 

// connect to the database
$db = mysqli_connect('mysql.hostinger.com', 'u605620843_root', 'testforme123', 'u605620843_TestForMe');

if (isset($_POST['submit'])) {
  // receive all input values from the form
  $company = mysqli_real_escape_string($db, $_POST['company']);
  $product = mysqli_real_escape_string($db, $_POST['product']);
  $testtype = mysqli_real_escape_string($db, $_POST['testtype']);
  $softwaretype = mysqli_real_escape_string($db, $_POST['softwaretype']);
  $deadline = mysqli_real_escape_string($db, $_POST['deadline']);
  $link = mysqli_real_escape_string($db, $_POST['link']);

  $query = "INSERT INTO jobs (company, product, testtype, softwaretype, deadline, link) 
  			  VALUES('$company', '$product', '$testtype', '$softwaretype','$deadline','$link')";
  	mysqli_query($db, $query);

  }
  



  
 

  
?>