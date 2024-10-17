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
    <link rel="stylesheet" href="css\styles.css">

</head>
<body>
    <header>
        <h1>F1 Dashboard Project</h1>
        <nav>
            <ul>
                <li><a href="#home">Home</a>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="API's">APIs</a></li>
            </ul>
        </nav>
    </header>
<main>
    <!-- <div>
        <form action="index.php" method="get">
                <label> Test Driver Database </label>
                <input type="text" name="driverRef">
                <input type="submit" name="Submit">
        </form>
    </div> -->
    <!-- <div>
        <ul>
            // <?php
            // if (isset($_GET['driverRef'])) {
                /*
                $driverRef = $_GET['driverRef'];
                $jsonList = file_get_contents("http://localhost/f2024-assign1/api/drivers.php?driverRef=" . urlencode($driverRef));
                $drivers = json_decode($jsonList, true);
                foreach ($drivers as $driver) {
                    echo "<li> " . $driver['driverRef'] . "</li>";
                }
                    */
            // }
            // else { // This is supposed to return the entire list of drivers if no query string, but its currently not working.
            //     $jsonList = file_get_contents("http://localhost/f2024-assign1/api/drivers.php");
            //     $drivers = json_decode($jsonList, true);
            //     foreach ($drivers as $driver) {
            //         echo "<li> " . $driver['driverRef'] . "</li>";
            //     }
            // }
            // ?>
        </ul>
    </div> -->


    <div class="container">
        <div class="sidebar"> 
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
