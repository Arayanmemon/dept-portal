<?php 
include "db.php";
include "header2.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

// Checking for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["login"];
    $project = $_POST["project"];
    $position = $_POST["position"];
    $year = $_POST["year"];
    
    $query = "INSERT INTO `projects`(`teacher_id`, `project_name`, `position`, `year`) VALUES ('${id}','${project}','${position}','${year}')";
    if(mysqli_query($conn, $query)){
        header("location:projects.php?success");
    }
}
?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Add Project</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Project Name</label>
            <input type="text" class="form-control" value='<?php echo $row['project_name']?>' name="project" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">Position</label>
            <input type="text" class="form-control" value='<?php echo $row['position']?>' name="position" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" value='<?php echo $row['year']?>' name="year" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>