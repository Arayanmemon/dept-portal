<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dept Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      .sidebar nav ul li a:hover{
        background-color: rgb(255, 12, 12);
      }
    </style>
  </head>
  <body>
      <div class="main">
          <div class="bg-secondary sidebar w-25">
            <nav>
              <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="education.php" >Education</a></li>
                <li><a href="courses.php" >Courses</a></li>
                <li><a href="positions.php" >Positions Held</a></li>
                <li><a href="projects.php" >Research Projects</a></li>
                <li><a href="responsibilities.php" >Responsibilities</a></li>
                <li><a href="publications.php" >Publications</a></li>
                <li><a href="downloads.php" >Downloads</a></li>
                <li><a href="grants.php" >Travel Grants</a></li>
              </ul>
            </nav>
          </div>
          <div>
              <div class="bg-secondary navbar" style="display: flex;justify-content: end;padding-right: 4rem;">
                  <a href="logout.php" class="btn btn-primary">Logout</a>
              </div>
              <a href="" class="btn btn-success" style="position: absolute;margin-top: 3rem;margin-left: 58rem;">Add</a>