<?php
// Initialise the session
session_start();

// Check if user is already logged in. If yes, then redirect them to the schedule page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('location: dashboard.html');
    exit();
}

// Include database connection file
require_once 'connection.php';

// Define variables and initialise with empty values
$username = $password = '';
$username_err = $password_err = '';

// Process form data when it is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if username is empty
    if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter username';
    } else {
        $username = trim($_POST['username']);
    }

    // check if password is empty
    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter password';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare the sql statement
        $sql = 'SELECT username, password FROM login WHERE username = ?';
        if ($statement = mysqli_prepare($connect, $sql)) {
            // Bind variables to prepared statement as parameters
            mysqli_stmt_bind_param($statement, 's', $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($statement)) {
                // Store result
                mysqli_stmt_store_result($statement);

                // Check if username exists. If it does, verify password
                if (mysqli_stmt_num_rows($statement) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($statement, $username, $hashed_password);
                    if (mysqli_stmt_fetch($statement)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct. Start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION['loggedin'] = true;
                            $_SESSION['username'] = $username;

                            // Redirect user to schedule page
                            header('location: dashboard.html');
                        } else {
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered is incorrect.';
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later!';
            }
        }
        // Close statement
        mysqli_stmt_close($statement);
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

    <title>LOGIN >> RIDGE HOSPITAL</title>

    <style>
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body
      {
        background: skyblue;
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
        color: white;
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
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                      <div class="form-row <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                          <div class="col-lg-7">
                              <label> Username </label>
                              <input type="text" name="username" placeholder="Username" class="form-control my-3 p-4 ">
                              <!--<span class="help-block">--><?php //echo '$username_err'; ?><!--</span>-->
                          </div>
                      </div>

                      <div class="form-row <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                          <div class="col-lg-7">
                              <label> Password </label>
                              <input type="password" name="password" placeholder="*******" class="form-control">
                              <!--<span class="help-block">--><?php //echo '$password_err'; ?><!--</span>-->
                          </div>
                      </div>

                      <div class="form-row">
                          <div class="col-lg-7">
                              <a href="dashboard.html">
                                  <button type="button" class="btn1 mt-3 mb-5">LOGIN </button>
                              </a>
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
