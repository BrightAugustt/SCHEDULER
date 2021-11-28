<?php

  require_once("Login_crud.php");
  $credentials = new Search;
  $credentials->db_connect();
    $email = "";
    $pass = "";

    $errors = array("email" => "", "pass"=> "");

    if(isset($_POST["SUBMIT"])){

      if(empty($_POST["email"])){
        $errors["email"] = "Required"; 
      }

      else if(empty($_POST['password'])){
        $errors['pass'] = "Required";
      }

      else{
        $credentials->getCred($email,$pass);
        $email_and_pass = $credentials->db_fetch();

      }

      if(!array_filter($errors)){
        if($email_and_pass['email'] === $email && $email_and_pass['password'] === $pass){
          header("Location: index2.php");
        }
      }


    }

  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>LOGIN FORM</title>

    <style>
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body
      {
        background: darkgrey;
      }
      .row
      {
        background: white;
        border-radius: 30px;
        box-shadow: 12px 12px 22px grey;
      }
      img
      {
        border-top-left-radius: 30px;
        border-bottom-left: 30px;

      }
      .btn1
      {
        border: none;
        outline: none;
        height: 50px;
        width: 100%;
        background-color: black;
        border-radius:4px ;
        font-weight:bold ;
      }
      .btn1:hover
      {
        background: white;
        border: 1px solid;
        color: black;
      }
    </style>
  </head>
  <body>
    <section class="Form my-4 mx-5">
      <div class="container">
        <div class="row g-0">
          <div class="col-lg-5">
            <img src="login1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1>SCHEDULER</h1>
            <h4>Sign into your account</h4>
            <form action="index2.php" method="post">
              <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
    
            <?php } ?>  
              <div class="form-row">
                <div class="col-lg-7">
                  <label> Enter Email Address </label>
                  <input type="email" name="email" placeholder="Email-Address" class="form-control my-3 p-4 ">
                </div>
              </div>

               <div class="form-row">
                <div class="col-lg-7">
                   <label> Enter Password </label>
                  <input type="password" name="password" placeholder="*******" class="form-control">
                </div>
              </div>

               <div class="form-row">
                <div class="col-lg-7">
                  <input type="submit" class="btn1 mt-3 mb-5" name="SUBMIT" value="LOGIN">
                </div>
              </div>
              <a href="#">Forgot Password</a>
              <p>Don't have an account?<a href="#">Register Here</a></p>
            </form>
          </div>
        </div>
        
      </div>
    </section>

  

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
