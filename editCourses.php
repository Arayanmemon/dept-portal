<?php 
include "db.php";
include "header2.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$course = $_GET['course'];
// Checking for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_type = $_POST["course_type"];
    $status = $_POST["status"];
    
    $query = "UPDATE courses SET course_name='{$course}', course_type='{$course_type}',`status`='{$status}' WHERE course_name='{$course}'";
    if(mysqli_query($conn, $query)){
        header("location:education.php?success");
    }
}

$sql = "SELECT * FROM courses WHERE teacher_id = '{$_SESSION['login']}' AND course_name= '{$_GET['course']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Edit Courses</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3">
            <label for="sibject" class="form-label">Course Name</label>
            <input type="text" disabled class="form-control" value='<?php echo $row['course_name']?>' name="course" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">Course Type</label>
            <input type="text" class="form-control" value='<?php echo $row['course_type']?>' name="course_type" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">Status</label>
            <input type="text" class="form-control" value='<?php if($row['status'] == 1){ echo "active"; } else{ echo "inactive"; } ?>' name="status" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>