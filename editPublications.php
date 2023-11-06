<?php 
include "db.php";
include "header2.php";

session_start();
if (isset($_SESSION['login'])) {
    
}
else{
    header("location:index.php?error=2");
}

$publicationID = $_GET['publicationID'];
// Checking for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $type = $_POST["type"];
    $year = $_POST["year"];
    
    $query = "UPDATE publications SET title='{$project}', `type`='{$type}',`year`='{$year}'  WHERE publication_id='{$publicationID}'";
    if(mysqli_query($conn, $query)){
        header("location:education.php?success");
    }
}

$sql = "SELECT * FROM publications WHERE teacher_id = '{$_SESSION['login']}' AND publication_id= '{$_GET['publicationID']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



?>

<body>
    <div class="container mt-5 w-50 mx-auto">
        <h3 class="text-center">Edit Publication</h3>
    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>" method="POST">
        <div class="mb-3 ">
            <label for="degree" class="form-label">Publication title</label>
            <input type="text" class="form-control" value='<?php echo $row['title']?>' name="title" >
        </div>
        <div class="mb-3 ">
            <label for="uni" class="form-label">Type</label>
            <input type="text" class="form-control" value='<?php echo $row['type']?>' name="type" >
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