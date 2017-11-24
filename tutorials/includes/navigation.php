<?php
$sql = "SELECT * FROM catagories WHERE parent = 0";
$pquery = $db->query($sql);
?>
 

 <!-- TOP Nav Bar-->
  <nav class="navbar navbar-default navbar-fixed-top ">
      <div class="container">
         <a href="index.php" class="navbar-brand" id="text">Stationary Management System</a>
          <ul class="nav navbar-nav">
            <?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
            <?php 
              $parent_id = $parent['id']; 
              $sql2 = "SELECT * FROM catagories WHERE parent = '$parent_id'";
              $cquery = $db->query($sql2);
            ?>
             <!-- Menu Items -->
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['catagory']; ?><span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
                      <li><a href="#"><?php echo $child['catagory']; ?></a></li>
                     <?php endwhile; ?>
                  </ul>
              </li>
              <?php endwhile; ?>  
          </ul>
      </div>
  </nav> 