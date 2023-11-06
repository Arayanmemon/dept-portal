<?php 
include "db.php";
include "header2.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$degree = $_GET['degree'];
// Checking for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST["subject"];
    $university = $_POST["university"];
    $year = $_POST["year"];
    
    $query = "UPDATE education SET degree='{$degree}', `subject` ='{$subject}', university='{$university}',`year`='{$year}' WHERE degree='{$degree}'";
    if(mysqli_query($conn, $query)){
        header("location:education.php?success");
    }
}

$sql = "SELECT * FROM education WHERE teacher_id = '{$_SESSION['login']}' AND degree= '{$_GET['degree']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Edit Education</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <!-- <div class="mb-3 ">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" class="form-control" value='<?php echo $row['degree']?>' name="degree" >
        </div> -->
        <div class="mb-3">
            <label for="sibject" class="form-label">Subject</label>
            <input type="text" class="form-control" value='<?php echo $row['subject']?>' name="subject" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">University</label>
            <input type="text" class="form-control" value='<?php echo $row['university']?>' name="university" >
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