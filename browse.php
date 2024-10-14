<?php
require_once 'data/db_conn.php';
// include 'api/drivers.php';

try {
    $conn = Database::createConnection();
    echo "test";
}
catch(PDOException $e) {
    echo "Database connection failed.";
}
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
        <h2>Browse</h2>
        <nav>
            <ul>
                <li><a href="/f2024-assign1/index.php?">Home</a>
                <li><a href="#browse">Browse</a></li>
                <li><a href="API's">APIs</a></li>
            </ul>
        </nav>
    </header>
<main>
    <div>
        <form action="index.php" method="get">
                <label> Test Driver Database </label>
                <input type="text" name="driverRef">
                <input type="submit" name="Submit">
        </form>
    </div>
    <div>

    </div>


    <div class="container">
        <div class="sidebar"> 
            <!-- //ill completely change this layout once we got functions working. -->
            <h1>2022 Races</h1><br>
            <h2>Circuits</h2>
            
            <?php
                $jsonList = file_get_contents("http://localhost/f2024-assign1/api/races.php");
                $races = json_decode($jsonList, true);

               if (isset($_GET['raceId'])) {
                $raceId = $_GET['raceId'];
                $jsonList = file_get_contents("http://localhost/f2024-assign1/api/races.php?raceId=$raceId");
                $races = json_decode($jsonList, true);
                //This shows Circuit Name of the Race // Bahrian Grand prix[race] --> Bahrian Internation Circuit
                
                foreach ($races as $race) {  //IDK WHY BUT THIS IS IMPORTANT ITS EMPTY XD.. When I put inside the bottom code it spams the circuit name when I join drivers and constructors in the table
                    
                }
                echo "<li> " . $race['cName'] . "</li>";
                    
            }
            else { // This is supposed to return the entire list of drivers if no query string, but its currently not working.
                foreach ($races as $race) {
                    //This shows name of race // Bahrian Grand Prix
                    echo "<li>  $race[rName] </li>";
                    echo "<a href=browse.php?raceId=$race[raceId]> races </a><br>";
                }
            }
                
            ?>
        </div>
            <div class="content">
                <?php
                     if (isset($_GET['raceId'])) {
                        echo "<h3>Race name:$race[rName]</h3>";
                        echo "<h3>race round:$race[round]</h3>";
                        echo "<h3>Circuit Name: $race[cName]</h3>";
                        echo "<h3>Circuit Location:$race[location]</h3>";
                        echo "<h3>Circuit Country:$race[country]</h3>";
                        echo "<h3>Date of Race:$race[date]</h3>";
                        echo "<h3>race round:$race[url]</h3>";


                        echo "<div id = qualifying>";
                        echo "<h1>Qualifying</h2>";
                        echo "<h3>Driver</h3>";
                        echo "$race[forename] ";
                        echo "$race[surname]";

                        echo "</div>";
                     }
                ?>
            </div>
    </div>
        
</main>
    
</body>
</html>
