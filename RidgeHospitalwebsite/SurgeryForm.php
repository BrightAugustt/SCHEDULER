<?php
require_once("Login_crud.php");
$surg = new Search;
$surg->db_connect();
  $patientID="";
  $fname="";
  $lname="";
  $date="";
  $gender="";
  $age="";
  $procedure1="";
  $details = "";

  $errors = array("patientID" => "", "fname" => "","lname" => "","date" => "",
  "gender" => "", "age" => "","procedure1" => "", "details" => "");

  if(isset($_POST["SUBMIT"])){



    if(!array_filter($errors)){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $patient = $_POST['patientID'];
        $gender = $POST['gender'];
        $age = $_POST['age'];
        $procedure1 = $_POST['procedure1'];
        $details = $_POST['details'];

        $surg->createSurgery($patient, $fname, $lname, $date,$email, $gender, $age, $procedure1, $details);
        echo "Done";

        header("Location: SurgeryForm.php");
      }
    
  }
  

?>










<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HTML CSS Register Form</title>
    <link rel="stylesheet" href="style/form-style.css">
  </head>
  <body>
    <form class="signup-form" action="SurgeryForm.php" method="post">

      <!-- form header -->
      <div class="form-header">
        <h1>Surgery Form</h1>
      </div>

      <!-- form body -->
      <div class="form-body">

        <!-- Firstname and Lastname -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="firstname" class="label-title">First name *</label>
            <input type="text" id="firstname" class="form-input" placeholder="enter your first name" required="required" name="firstname" />
          </div>
          <div class="form-group right">
            <label for="lastname" class="label-title">Last name</label>
            <input type="text" id="lastname" class="form-input" placeholder="enter your last name" name="lastname" />
          </div>
        </div>

        <!-- Email -->
        <div class="form-group">
          <label for="email" class="label-title">Email*</label>
          <input type="email" id="email" class="form-input" placeholder="enter your email" required="required" name="email">
        </div>

        <!-- PatientID and Recommended Start time and Date -->
        <div class="horizontal-group">
            <div class="form-group left">
                <label for="PatientID" class="label-title">Patient ID</label>
                <input type="text" id="PatientID" class="form-input" name="patientID" placeholder="ESS - XXXX - XXXX- XXXX" required="required">
              </div>
          <div class="form-group right">
            <label for="Start-Time" class="label-title">Preferred Date and Time</label>
            <input type="datetime-local" class="form-input" id="Start-Time" name="date" placeholder="enter your preferred Start-time" required="required">
          </div>
        </div>

        <!-- Gender and Age -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label class="label-title">Gender:</label>
            <div class="input-group">
              <label for="male"><input type="radio" name="gender" value="male" id="male"> Male</label>
              <label for="female"><input type="radio" name="gender" value="female" id="female"> Female</label>
            </div>
          </div>
          <div class="form-group right">
            <label for="experience" class="label-title">Age</label>
            <input type="number" min="18" max="80" name="age" value="18" class="form-input">
          </div>
        </div>


        <!-- Procedure -->
          <div class="form-group left">
            <label for="Procedure" class="label-title">Procedure</label>
            <input type="text"  id="procedure" name="procedure" class="form-input" placeholder="What Procedure Are you Having Done?" required="required">
          </div>
        

        <!-- Any Extra Health Details to be aware Of -->
        <div class="form-group">
          <label for="extraDetails" class="label-title">Extra Health Details</label>
          <textarea class="form-input" rows="4" cols="50" style="height:auto" name="details"></textarea>
        </div>
      </div>

      <!-- form-footer -->
      <div class="form-footer">
        <span>* required</span>
        <input type="submit" class="btn" name="SUBMIT" value="Create">
      </div>

    </form>

    <!-- Script for range input label -->
    <script>
      var rangeLabel = document.getElementById("range-label");
      var experience = document.getElementById("experience");

      function change() {
      rangeLabel.innerText = experience.value + "K";
      }
    </script>

  </body>
</html>