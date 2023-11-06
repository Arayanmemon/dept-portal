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
    $position = $_POST['position'];
    $university = $_POST["university"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    
    $query = "INSERT INTO `positions`(`teacher_id`, `position_name`, `university`, `start_date`, `end_date`) VALUES ('${id}', '${position}', '${university}', '${start}', '${end}')";
    if(mysqli_query($conn, $query)){
        header("location:positions.php?success");
    }
}
?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Add Position</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Position</label>
            <input type="text" class="form-control" name="position" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">University</label>
            <input type="text" class="form-control" name="university" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">Start Date</label>
            <input type="number" class="form-control" name="start" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">End Date</label>
            <input type="number" class="form-control" name="end" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>