<?php 
include "db.php";
include "header2.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$position = $_GET['position'];
// Checking for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $university = $_POST["university"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    
    $query = "UPDATE positions SET position_name='{$position}', university='{$university}',`start_date`='{$start}' ,`start_date`='{$end}' WHERE position_name='{$position}'";
    if(mysqli_query($conn, $query)){
        header("location:education.php?success");
    }
}

$sql = "SELECT * FROM positions WHERE teacher_id = '{$_SESSION['login']}' AND position_name= '{$_GET['position']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Edit Education</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Position</label>
            <input type="text" disabled class="form-control" value='<?php echo $row['position_name']?>' name="position" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">University</label>
            <input type="text" class="form-control" value='<?php echo $row['university']?>' name="university" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">Start Date</label>
            <input type="number" class="form-control" value='<?php echo $row['start_date']?>' name="start" >
        </div>
        <div class="mb-3 ">
            <label for="year" class="form-label">End Date</label>
            <input type="number" class="form-control" value='<?php echo $row['end_date']?>' name="end" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>