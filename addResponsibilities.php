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
    $title = $_POST['title'];
    $university = $_POST["university"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    
    $query = "INSERT INTO `responsibilities`(`teacher_id`, `title`, `university`, `start_date`, `end_date`) VALUES ('${id}','${title}','${university}','${start}','${end}')";
    if(mysqli_query($conn, $query)){
        header("location:responsibilities.php?success");
    }
}
?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Add Responsibility</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Title</label>
            <input type="text"  class="form-control" name="title" >
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
            <input type="text" class="form-control" name="end" >
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
    </div>
</body>
</html>