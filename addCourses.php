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
    $id = $_SESSION['login'];
    $course = $_POST['course'];
    $course_type = $_POST["course_type"];
    $status = $_POST["status"] == "active" ? 1 : 0;
    
    $query = "INSERT INTO `courses`(`teacher_id`,`course_name`,`course_type`, `status`) VALUES ('${id}','${course}','${course_type}','${status}')";
    if(mysqli_query($conn, $query)){
        header("location:courses.php?courseadded");
    }
}
?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Add Course</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3">
            <label for="sibject" class="form-label">Course Name</label>
            <input type="text" class="form-control" name="course" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">Course Type</label>
            <input type="text" class="form-control" name="course_type" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>