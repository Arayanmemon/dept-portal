<?php 
include "db.php";
include "header.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$sql = "SELECT * FROM info WHERE teacher_id = '{$_SESSION['login']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

          
              <div class="text-center mt-5 w-75" >
                <h3><?php echo $row['name'] ?></h3>
                <p><?php echo $row['email'] ?></p>
                <p><?php echo $row['phone'] ?></p>
                <p><?php echo $row['description'] ?></p>
              </div>
          </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>