<?php 
include "db.php";
include "header.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$sql = "SELECT * FROM education WHERE teacher_id = '{$_SESSION['login']}'";
$result = $conn->query($sql);
?>

              <div class="table-responsive mt-5 mx-5 px-5 py-5">
                <table class="table table-striped ">
                  <thead>
                    <tr>
                      <th scope="col">Degree</th>
                      <th scope="col">Subject</th>
                      <th scope="col">University</th>
                      <th scope="col">Year</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $result->fetch_assoc()){?>
                    <tr class="">
                      <td scope="row"><?php echo $row['degree'] ?></td>
                      <td><?php echo $row['subject'] ?></td>
                      <td><?php echo $row['university'] ?></td>
                      <td><?php echo $row['year'] ?></td>
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