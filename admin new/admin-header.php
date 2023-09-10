<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="bootstrap.css"> 
</head>
<body>
<header class="bg-light">
    <div class="container">
      <h1>Hello <?php echo $_SESSION['username']?></h1>
      <p>Your Perfect Dining Experience</p>
      <nav>
        <ul class="nav">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link disabled" href="admin.php">Orders</a></li>
          <li class="nav-item"><a class="nav-link disabled" href="tables.php">Table Bookings</a></li>
          <li class="nav-item"><a class="nav-link btn-danger rounded" href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>    
</body>
</html>