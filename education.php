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
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($row = $result->fetch_assoc()){?>
                    <tr class="">
                      <td scope="row"><?php echo $row['degree'] ?></td>
                      <td><?php echo $row['subject'] ?></td>
                      <td><?php echo $row['university'] ?></td>
                      <td><?php echo $row['year'] ?></td>
                      <td><a href="editEducation.php?degree=<?php echo $row['degree']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                      </a></td>
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