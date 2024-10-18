<?php
require_once 'data/db_conn.php';
// include 'api/drivers.php';

// try {
//     $conn = Database::createConnection();
//     echo "test";
// }
// catch(PDOException $e) {
//     echo "Database connection failed.";
// }
// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>F1 Dashboard Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css\styles.css">
</head>
<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">F1 Dashboard Project</span>
        </a>
        <!-- <h2>Browse</h2> -->
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/f2024-assign1/index.php?" class="nav-link ">Home</a>
            <li class="nav-item"><a href="/f2024-assign1/browse.php?" class="nav-link active">Browse</a></li>
            <li class="nav-item"><a href="API's" class="nav-link">APIs</a></li>
        </ul>
    </header>
<main>
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


                //Race API
               if (isset($_GET['raceId'])) {
                $raceId = $_GET['raceId'];

                $jsonListraces = file_get_contents("http://localhost/f2024-assign1/api/races.php?raceId=$raceId");
                $jsonListqualifying = file_get_contents("http://localhost/f2024-assign1/api/qualifying.php?raceId=$raceId");
                $jsonListresults = file_get_contents("http://localhost/f2024-assign1/api/results.php?raceId=$raceId");

                $qualifying = json_decode($jsonListqualifying, true);
                $results = json_decode($jsonListresults, true);
                $races = json_decode($jsonListraces, true);

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


                        //change this to qualifying + results array info.

                        echo "<div id = qualifying>";
                        echo "<h1>Qualifying</h1>";
                        echo "<h3>Driver</h3>";

                        echo "<table class = table>";
                        echo "<tr>";
                        echo "<th> Position </th>";
                        echo "<th> Name </th>";
                        echo "<th> Contructor </th>";
                        echo "<th> Q1 </th>";
                        echo "<th> Q2 </th>";
                        echo "<th> Q3 </th>";
                        echo "</tr>";
                        foreach($qualifying as $qualify){

                            echo "<tr>";
                            echo "<td>".  $qualify["position"] .  "</td>";
                            echo "<td><a href=api\drivers.php?driverRef=$qualify[driverRef]>".  $qualify["forename"] . " " . $qualify["surname"] . "</a></td>";
                            echo "<td>".  $qualify["conName"] . "</td>";
                            echo "<td>".  $qualify["q1"] . "</td>";
                            echo "<td>".  $qualify["q2"] . "</td>";
                            echo "<td>".  $qualify["q3"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";


                        echo "<div id = results>";
                        echo "<h1> Results </h1>";

                        echo "<table class = table>";
                        echo "<tr>";

                        for ($i=0; $i < 3; $i++) {
                            echo "<th>". $results[$i]["forename"] . " " . $results[$i]["surname"] . "</th>";
                        }
                        echo "</tr>";

                        for ($i=0; $i < 3; $i++) {
                            echo "<td>" . $results[$i]["position"] . "</td>";
                        }
                        echo "</tr>";
                        echo "</table>";

                        echo "<table class = table>";
                        echo "<tr>";
                        echo "<th> Position </th>";
                        echo "<th> Name </th>";
                        echo "<th> Laps </th>";
                        echo "<th> Points </th>";
                        echo "<tr>";
                        foreach($results as $result){
                            
                            echo "<tr>";
                            echo "<td>".  $result["position"] .  "</td>";
                            echo "<td><a href=drivers.php?driverRef=$qualify[driverRef]>".  $result["forename"] . " " . $result["surname"] . "</a></td>";
                            echo "<td>".  $result["laps"] . "</td>";
                            echo "<td>".  $result["points"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";


                     }
                ?>
            </div>
    </div>
        
</main>
    
</body>
</html>
