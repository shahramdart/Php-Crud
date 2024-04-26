<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="box form-box">


      <?php

include("php/config.php");
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $stage = $_POST['stage'];
  $department = $_POST['department'];
  $password = $_POST['password'];

  $verify_query = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

  if(mysqli_num_rows($verify_query) != 0){
    echo "<div class='message'> 
    <p>This email is used, Try another email for registering</p> </div> <br>  ";
    echo "<a href='javascript:self.history.back()'><button class='btn'>Back</button>";
  } else {
    $insert_query = "INSERT INTO users (name, email, department, stage, password) VALUES ('$name', '$email', '$department', '$stage', '$password')";
    if(mysqli_query($conn, $insert_query)) {
      echo "<div class='message'> 
      <p>Registration successful</p> </div> <br>  ";
      echo "<a href='index.php'><button class='btn'>Login</button>";
    } else {
      echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
  }
} else {
?>


        <header>Sign up</header>
        <form action="" method="post">
          <div class="field input">
            <label for="Name">Name</label>
            <input
              type="text"
              name="name"
              id="name"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="Email">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="Stage">Stage</label>
            <input
              type="text"
              name="stage"
              id="stage"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="Department">Department</label>
            <input
              type="text"
              name="department"
              id="department"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="Password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              autocomplete="off"
              required
            />
          </div>

          <div class="field">
            <input
              type="submit"
              class="btn"
              class="btn"
              name="submit"
              value="Sign up"
              required
            />
          </div>
          <div class="links">
            I have an account ? <a href="index.php">LOGIN</a>
          </div>
        </form>
      </div>
      <?php }?>
    </div>
  </body>
</html>
