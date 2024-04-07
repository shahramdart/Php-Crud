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
    <title>Home</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <div class="nav">
      <div class="logo">
        <p><a href="home.php">Home</a></p>
      </div>
      <div class="right-links">
     
        <a href="adduser.php"><button class="btn">Add User</button></a>
        <a href="profile.php"><button class="btn">Profile</button></a>
        <a href="php/logout.php"><button class="btn">Log out</button></a>
      </div>
    </div>
    <!-- Table View users  -->
    <div class="container">
      <?php 

      if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        '.$msg.'
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
      
      
      ?>
      <table class="table table-hover text-center">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Department</th>
            <th scope="col">Stage</th>
            <th scope="col">Age</th>
            <th scope="col">College Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            
          
            $query = mysqli_query($conn, "SELECT * FROM all_users");

            while($row = mysqli_fetch_assoc($query)){
              ?> 
              <tr>
            <td ><?php echo $row['id'] ?></td>
            <td ><?php echo $row['name']; ?></td>
            <td ><?php echo $row['email']; ?></td>
            <td ><?php echo $row['department']; ?></td>
            <td ><?php echo $row['stage']; ?></td>
            <td ><?php echo $row['age']; ?></td>
            <td ><?php echo $row['college_name']; ?></td>
            <td>
              <a href="update_all_users.php?id=<?php echo $row['id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="php/delete.php?id=<?php echo $row['id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
          <?php
            }
            ?>
          
          
          
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
