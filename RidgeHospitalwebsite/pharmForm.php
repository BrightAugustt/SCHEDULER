<?php
require_once("Login_crud.php");
$pharm = new Search;
$pharm->db_connect();
  $patientID="";
  $fname="";
  $lname="";
  $date="";
  $gender="";
  $age="";
  $items="";
  $details = "";

  $errors = array("patientID" => "", "fname" => "","lname" => "","date" => "",
  "gender" => "", "age" => "","items" => "", "details" => "");

  if(isset($_POST["SUBMIT"])){



    if(!array_filter($errors)){

       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] ='email must be a valid email address';
      }
      
      //check regex for first name
      if (!preg_match('/^[a-zA-Z]+$/', $fname)) {
        $errors['firstname'] = 'first name must be letters only';
      }

      //check regex for last name
      if (!preg_match('/^[a-zA-Z]+$/', $lname)) {
         $errors['lastname'] = 'last name must be letters only';
      }

      //check regex for age
      if (!preg_match('/^[0-9]+$/', $age)) {
         $errors['age'] ='age must be numbers only';
      }


      //check regex for details
      if (!preg_match('/^[a-zA-Z\s]+$/', $details)) {
         $errors['details'] ='first name must be letters only';
      }

    

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $patient = $_POST['patientID'];
        $gender = $POST['gender'];
        $age = $_POST['age'];
        $items = $_POST['items'];
        $details = $_POST['details'];

        $pharm->createPharm($patient, $fname, $lname, $date, $gender, $age, $items, $details, $email);
        echo "Done";

        //redirect to same page
        header("Location: pharmForm.php");
      }
    
  }
  

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pharmacy Form</title>
    <link rel="stylesheet" href="style/form-style.css">
  </head>
  <body>
    <form class="signup-form" action="pharmForm.php" method="post">

      <!-- form header -->
      <div class="form-header">
        <h1>Pharmacy Form</h1>
      </div>

      <!-- form body -->
      <div class="form-body">

        <!-- Firstname and Lastname -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="firstname" class="label-title">First name *</label>
            <input type="text" id="firstname" class="form-input" placeholder="enter your first name" required="required" name='firstname' />
          </div>
          <div class="form-group right">
            <label for="lastname" class="label-title">Last name</label>
            <input type="text" id="lastname" class="form-input" placeholder="enter your last name" name='lastname'/>
          </div>
        </div>

        <!-- Email -->
        <div class="form-group">
          <label for="email" class="label-title">Email*</label>
          <input type="email" id="email" class="form-input" placeholder="enter your email" required="required" name='email'> 
        </div>

        <!-- PatientID and Recommended Start time and Date -->
        <div class="horizontal-group">
            <div class="form-group left">
                <label for="PatientID" class="label-title">Patient ID</label>
                <input type="text" id="PatientID" class="form-input" placeholder="ESS - XXXX - XXXX- XXXX" required="required" name='patientID'>
              </div>
          <div class="form-group right">
            <label for="Start-Time" class="label-title">Preferred Date and Time</label>
            <input type="datetime-local" class="form-input" id="Start-Time" placeholder="enter your preferred Start-time" required="required" name='date'>
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
            <input type="number" min="18" max="80"  value="18" class="form-input" name='age'>
          </div>
        </div>


        <!-- Items -->
          <div class="form-group left">
            <label for="Items" class="label-title">Medical Items</label>
            <input type="text"  id="Items" class="form-input" placeholder="What Items have you been asked to Acquire?" required="required" name='items'>
          </div>
        

        <!-- Any Extra Health Details to be aware Of -->
        <div class="form-group">
          <label for="extraDetails" class="label-title">Extra Health Details</label>
          <textarea class="form-input" rows="4" cols="50" style="height:auto" name='details'></textarea>
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