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
    <style>
      nav {
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #ffffff;
  z-index: 99;
}

.nav__content {
  max-width: var(--max-width);
  margin: auto;
  padding: 1.5rem 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

nav .logo a {
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--primary-color);
  transition: 0.3s;
}
nav .logo a:hover {
  color: var(--primary-color-dark);
}

nav .checkbox {
  display: none;
}

nav input {
  display: none;
}
nav .checkbox i {
  font-size: 2rem;
  color: var(--primary-color);
  cursor: pointer;
}

ul {
  display: flex;
  align-items: center;
  gap: 1rem;
  list-style: none;
  transition: left 0.3s;
}

ul li a {
  padding: 0.5rem 1rem;
  border: 2px solid transparent;
  text-decoration: none;
  font-weight: 600;
  color: var(--text-dark);
  transition: 0.3s;
}

ul li a:hover {
  border-top-color: var(--secondary-color);
  border-bottom-color: var(--secondary-color);
  color: var(--secondary-color);
}
    </style>
  </head>
  <body>
  <nav>
    <div class="nav__content">
      <div class="logo"><a href="home.php" style="margin-left: 100px;">Home</a></div>
      <label for="check" class="checkbox">
        <i class="ri-menu-line"></i>
      </label>
      <input type="checkbox" name="check" id="check" />
      <ul>
      <li><a href="profile.php">Profile</a></li>   
        <li><a href="adduser.php">Register User</a></li>
        <li><a href="index.php">Login</a></li>
        <li><a href="php/logout.php">Log out</a></li>
      </ul>
    </div>
  </nav>
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
              <!-- // ? aw delete a esh naka  -->
              <a href="php/delete.php?id=<?php echo $row['id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
              <!-- // ? aw delete a esh naka  -->
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
