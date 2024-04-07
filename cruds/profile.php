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
    <title>Profile</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <div class="nav">
      <div class="logo">
        <p><a href="home.php">Profile</a></p>
      </div>
      <div class="right-links">
      <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

            while($result = mysqli_fetch_assoc($query)){
              $res_name = $result['name'];
              $res_email = $result['email'];
              $res_department = $result['department'];
              $res_stage = $result['stage'];
              $res_id = $result['id'];
            }
            
            echo "<a href='update.php?Id=$res_id'><button class='btn'>Update Admin</button></a>";
            ?>
        <a href="adduser.php"><button class="btn">Add User</button></a>
        <a href="home.php"><button class="btn">Home</button></a>
        <a href="php/logout.php"><button class="btn">Log out</button></a>
      </div>
    </div>
    <main>
      <div class="main-box top">
        <div class="top">
          <div class="box">
            <p>Hello <b><?php echo $res_name; ?></b>, Welcome</p>
          </div>
          <div class="box">
            <p>Your Email is <b><?php echo $res_email; ?></b></p>
          </div>
        </div>
        <div class="bottom">
          <div class="box">
            <p>Your Department is <b><?php echo $res_department; ?></b>.</p>
          </div>
          <div class="box">
            <p>You are the <b><?php echo $res_stage; ?></b> stage.</p>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
