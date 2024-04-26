<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Profile</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <div class="nav">
      <div class="logo">
        <p><a href="home.php">Home</a></p>
      </div>
      <div class="right-links">
        <!-- <a href="adduser.php"><button class="btn">Add User</button></a> -->
        <a href="php/logout.php"><button class="btn">Log out</button></a>
      </div>
    </div>
    <div class="container">
      <div class="box form-box">
        <?php 

        if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $department = $_POST['department'];
          $stage = $_POST['stage'];

          $id = $_SESSION['id'];

          $update_query = mysqli_query($conn, "UPDATE users SET name = '$name', department = '$department', stage = '$stage' WHERE id = $id") or die("error occured");

          if($update_query){
            echo "<div class='message'> 
      <p>Updating Profile successful</p> </div> <br>  ";
      echo "<a href='profile.php'><button class='btn'>Home</button>";
          }


        }else {



          $id = $_SESSION['id'];
          $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");


          while ($result = mysqli_fetch_assoc($query)) {
             $res_name = $result['name'];
              $res_email = $result['email'];
              $res_department = $result['department'];
              $res_stage = $result['stage'];
          }



         ?>



        <header>Update Profile</header>
        <form action="" method="post">
          <div class="field input">
            <label for="Username">Name</label>
            <input
              type="text"
              name="name"
              id="name"
              value="<?php echo $res_name; ?>"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="Email">Email</label>
            <input
              type="email"
              value="<?php echo $res_email; ?>"
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
              value="<?php echo $res_stage; ?>"
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
              value="<?php echo $res_department; ?>"
              name="department"
              id="department"
              autocomplete="off"
              required
            />
          </div>

          <div class="field">
            <input
              type="submit"
              class="btn"
              name="submit"
              value="Update"
              required
            />
          </div>
        </form>
      </div>
      <?php }?>
    </div>
  </body>
</html>
