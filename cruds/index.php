<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="box form-box">
        <?php 

        include("php/config.php");

        if(isset($_POST['submit'])){
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $password = mysqli_real_escape_string($conn, $_POST['password']);

          $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die("Select Error");
          $row = mysqli_fetch_assoc($result);

          if(is_array($row) && !empty($row)){
            $_SESSION['valid'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['department'] = $row['department'];
            $_SESSION['stage'] = $row['stage'];
            $_SESSION['id'] = $row['id'];
          }else{
            echo "<div class='message'> 
    <p>Email or Password wrong! Try again</p> </div> <br>  ";
    echo "<a href='index.php'><button class='btn'>Back</button>";
          }
          if(isset($_SESSION['valid'])){
            header("Location: home.php");
          }
        }else{
        
        ?>
        <header>Login</header>
        <form action="" method="post">
          <div class="field input">
            <label for="Email">Email</label>
            <input
              type="text"
              name="email"
              id="email"
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
              name="submit"
              value="Login"
              required
            />
          </div>
          <div class="links">
            Don't have an account ? <a href="register.php">SIGN UP</a>
          </div>
        </form>
      </div>
      <?php }?>
        </div>
  </body>
</html>
