<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add User</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
  <div class="nav">
      <div class="logo">
        <p><a href="home.php">Home</a></p>
      </div>
      <div class="right-links">
        <a href="php/logout.php"><button class="btn">Log out</button></a>
      </div>
    </div>
    <div class="container">
      <div class="box form-box">


      <?php

include("php/config.php");
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $stage = $_POST['stage'];
  $department = $_POST['department'];
  $age = $_POST['age'];
  $college_name = $_POST['college_name'];


  $insert_query = "INSERT INTO all_users (name, email, department, stage, age, college_name) VALUES ('$name', '$email', '$department', '$stage', '$age', '$college_name')";
    if(mysqli_query($conn, $insert_query)) {
      echo "<div class='message'> 
      <p>Adding user successfull</p> </div> <br>  ";
      echo "<a href='home.php'><button class='btn'>Home</button>";
    } else {
      echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
} else {
?>


        <header>Add User</header>
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
            <label for="Age">Age</label>
            <input
              type="number"
              name="age"
              id="age"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="college_name">college_name</label>
            <input
              type="text"
              name="college_name"
              id="college_name"
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
              value="Add"
              required
            />
          </div>
          
        </form>
      </div>
      <?php }?>
    </div>
  </body>
</html>
