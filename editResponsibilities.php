<?php 
include "db.php";
include "header2.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$title = $_GET['title'];
// Checking for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $university = $_POST["university"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    
    $query = "UPDATE responsibilities SET title='{$title}', university='{$university}',`start_date`='{$start}',`end_date`='{$end}' WHERE title='{$title}'";
    if(mysqli_query($conn, $query)){
        header("location:education.php?success");
    }
}

$sql = "SELECT * FROM responsibilities WHERE teacher_id = '{$_SESSION['login']}' AND title= '{$_GET['title']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Edit Responsibility</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Title</label>
            <input type="text" disabled class="form-control" value='<?php echo $row['title']?>' name="title" >
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
            <input type="text" class="form-control" value='<?php echo $row['end_date']?>' name="end" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>