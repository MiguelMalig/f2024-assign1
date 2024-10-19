<?php
require_once 'data/db_conn.php';
// include 'api/drivers.php';

// try {
//     $conn = Database::createConnection();

// }
// catch(PDOException $e) {
//     echo "Database connection failed.";
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>F1 Dashboard Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <!-- NavBAR -->
    <header class="container-fluid d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">F1 Dashboard Project</span>
        </a>
            <ul class="nav nav-pills mb-4">
                <li class="nav-item"><a href="#home" class="nav-link active">Home</a>
                <li class="nav-item"><a href="browse.php" class="nav-link">Browse</a></li>
                <li class="nav-item"><a href="API's" class="nav-link">APIs</a></li>
            </ul>

           <div class="container-fluid p-4 my-2 bg-light rounded-3 text-white" id="herophoto">
            <h1 class="display-1 fw-bold mb-5">F1 Racing</h1>
            <p class="col-md-8 lead mb-5">If everything seems under control, you're just not going fast enough </p>
            <button class="btn btn-dark btn-lg" type="button"> Browse</button>
           </div>
          
    </header>

    <!-- Our team info -->
    <div class="container">
        <div class="col-md-4 col-lg-4 px-md-4"> 
            <!-- //ill completely change this layout once we got functions working. -->
            <h1>What this site is about?</h1><br>
            <p>This site is about Formula 1 car racing data. Specifically season 2022.</p></p>
            <h2>What technologies you are using:</h2>
            <p> We will be using SQLite for our database server.</p>
            <p> We will be using PHP.</p>
            <h3>Group members:</h3>
            <p>Miguel and Justin<p> <br>
            <p><strong>github repo: https://github.com/MiguelMalig/f2024-assign1</p> 
        </div>
            <div class="main-content">
                <img src="photos\Formula1homepage.webp" alt="formula1racecar">
            </div>
    </div>
        
</main>
    
</body>
</html>
