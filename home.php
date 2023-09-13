<?php 
session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$conn = new mysqli("localhost", "root", "" , "dept-portal");
$sql = "SELECT * FROM education WHERE teacher_id = '{$_SESSION['login']}'";
$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <div class="main">
          <div class="bg-secondary sidebar">
            <nav>
              <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Update publication</a></li>
                <li><a href="#">Update downloads</a></li>
                <li><a href="#">Update info</a></li>
              </ul>
            </nav>
          </div>

          <div>
              <div class="bg-secondary navbar">
                  <a href="logout.php">Logout</a>
              </div>
              <div class="table-responsive mt-5 mx-5 px-5 py-5">
                <table class="table table-striped ">
                  <thead>
                    <tr>
                      <th scope="col">Degree</th>
                      <th scope="col">SUbject</th>
                      <th scope="col">University</th>
                      <th scope="col">Year</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $result->fetch_assoc()){?>
                    <tr class="">
                      <td scope="row"><?php echo $row['Degree'] ?></td>
                      <td><?php echo $row['Subject'] ?></td>
                      <td><?php echo $row['University'] ?></td>
                      <td><?php echo $row['Year'] ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              
          </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>