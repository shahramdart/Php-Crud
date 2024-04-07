<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: home.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update User</title>
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
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $stage = mysqli_real_escape_string($conn, $_POST['stage']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $college_name = mysqli_real_escape_string($conn, $_POST['college_name']);
        $id = $_GET['id'];
    
        // Update user data in the database
        $update_query = mysqli_query($conn, "UPDATE all_users SET name = '$name', department = '$department', stage = '$stage', age = '$age', college_name = '$college_name' WHERE id = $id") or die(mysqli_error($conn));
    
        // Check if update was successful
        if($update_query){
            echo "<div class='message'><p>Updating User successful</p></div><br>";
            echo "<a href='home.php'><button class='btn'>Home</button></a>";
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }else{

    ?>

        <header>Update User</header>

        <?php 

        $id = $_GET['id'];

        $query = mysqli_query($conn, "SELECT * FROM all_users WHERE id = $id");
        $row = mysqli_fetch_assoc($query);
        
        ?>
        <form action="" method="post">
          <div class="field input">
            <label for="Username">Name</label>
            <input
              type="text"
              name="name"
              id="name"
              value="<?php echo $row['name']; ?>"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="Email">Email</label>
            <input
              type="email"
              value="<?php echo $row['email']; ?>"
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
              value="<?php echo $row['stage']; ?>"
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
              value="<?php echo $row['department']; ?>"
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
              value="<?php echo $row['age']; ?>"
              name="age"
              id="age"
              autocomplete="off"
              required
            />
          </div>

          <div class="field input">
            <label for="College Name">College Name</label>
            <input
              type="text"
              value="<?php echo $row['college_name']; ?>"
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
