<?php 
include "db.php";
include "header2.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['login'];
    $degree = $_POST['degree'];
    $subject = $_POST["subject"];
    $university = $_POST["university"];
    $year = $_POST["year"];
    
    $query = "INSERT INTO `education`(`teacher_id`, `degree`, `subject`, `university`, `year`) VALUES ('${id}','${degree}','${subject}','[${university}','${year}')";
    if(mysqli_query($conn, $query)){
        header("location:education.php?success");
    }
}
?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Add Education</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" class="form-control" name="degree" >
        </div>
        <div class="mb-3">
            <label for="sibject" class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">University</label>
            <input type="text" class="form-control" name="university" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" name="year" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>