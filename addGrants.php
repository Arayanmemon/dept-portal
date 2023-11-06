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
    $id  = $_SESSION['login'];
    $title = $_POST["title"];
    $type = $_POST["type"];
    $year = $_POST["year"];
    
    $query = "INSERT INTO `grants`(`teacher_id`, `title`, `grant_type`, `year`) VALUES ('${id}', '${title}', '${type}', '${year}')";
    if(mysqli_query($conn, $query)){
        header("location:grants.php?success");
    }
}
?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Add Grant</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Grant title</label>
            <input type="text" class="form-control" name="title" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">Type</label>
            <input type="text" class="form-control" name="type" >
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