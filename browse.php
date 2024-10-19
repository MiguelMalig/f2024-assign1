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
        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">F1 Dashboard Project</span>
        </a>
        <!-- <h2>Browse</h2> -->
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/f2024-assign1/index.php?" class="nav-link ">Home</a>
            <li class="nav-item"><a href="/f2024-assign1/browse.php?" class="nav-link active">Browse</a></li>
            <li class="nav-item"><a href="/f2024-assign1/api.php" class="nav-link">APIs</a></li>
        </ul>
    </header>

                <!-- //ill completely change this layout once we got functions working. -->
        <div class="container-fluid py-5">
            </div>
            <?php
                    $jsonList = file_get_contents("http://localhost/f2024-assign1/api/races.php");
                    $races = json_decode($jsonList, true);
                    
                    
                    //WHEN USER SELECTS RACE =====================================================================
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
                            echo "<div class='container marketing'>";
                                echo "<div class='row featurette'>";
                                    echo "<div class='d-flex flex-column align-items-center'>";
                                        echo "<h1 class='display-2 fw-bold'>$race[rName]</h1>";
                                        echo "<h1 class='display-5 fw-light'>$race[cName]</h1>";
                                        echo "<p class='col-md-8 fs-4 text-center'>$race[location], $race[country]</p>";
                                        echo "<p class='col-md-8 fs-4 text-center'>$race[raceDate]";
                                echo "</div>";
                            echo "<hr class='featurette-divider'>";

                            // QUALIFYING SECTION=============================================================================
                          echo "<div class='row featurette'>";
                          echo "<h1 class=display-4 fw-normal text-body-emphasis>Qualifying</h1>";
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
                              echo "<td><a href=drivers.php?driverRef=$qualify[driverRef]>".  $qualify["forename"] . " " . $qualify["surname"] . "</a></td>";
                              echo "<td>".  $qualify["conName"] . "</td>";
                              echo "<td>".  $qualify["q1"] . "</td>";
                              echo "<td>".  $qualify["q2"] . "</td>";
                              echo "<td>".  $qualify["q3"] . "</td>";
                              echo "</tr>";
                          }
                          echo "</table>";
                          echo "</div>";

                          echo "<hr class='featurette-divider'>";
                          
                          //RESULTS SECTION=======================================================================================
                          echo "<div class='row featurette'>";
                          echo "<h1 class='display-4 fw-normal text-body-emphasis'>Results</h1>";
                          echo "<div class='mx-auto'>";
                          echo '<div class="text-center">';
                          echo "<h3 class='display-5 fw-light'>Top 3</h3>";
                          echo '</div>';
                          echo "<div class='d-flex flex-row'>";
                         
                          $medals = ['gold', 'silver', 'bronze'];
                          
                          for ($i = 0; $i < 3; $i++) {
                              $medal = $medals[$i];
                              echo '<div class="col-md-4">';
                              echo '<div class="border p-3 m-2 text-center ' . $medal . '">';
                              echo '<h3>' . $results[$i]["forename"] . ' ' . $results[$i]["surname"] . '</h3>';
                              if ($results[$i]["position"] == 1) {
                                  echo '<h1>' . $results[$i]["position"] . 'st</h1>';
                              } else if ($results[$i]["position"] == 2) {
                                  echo '<h1>' . $results[$i]["position"] . 'nd</h1>';
                              } else {
                                  echo '<h1>' . $results[$i]["position"] . 'rd</h1>';
                              }
                              echo '</div>';
                              echo '</div>';
                          }
                          
                          
                          
                          echo "</div>";
                          echo "<table class='table'>";
                          echo "<tr>";
                          echo "<th>Position</th>";
                          echo "<th>Name</th>";
                          echo "<th>Laps</th>";
                          echo "<th>Points</th>";
                          echo "</tr>";
                          
                          foreach ($results as $result) {
                              echo "<tr>";
                              echo "<td>" . $result["position"] . "</td>";
                              echo "<td><a href=drivers.php?driverRef=$qualify[driverRef]>".  $result["forename"] . " " . $result["surname"] . "</a></td>";
                              echo "<td>" . $result["laps"] . "</td>";
                              echo "<td>" . $result["points"] . "</td>";
                              echo "</tr>";
                          }
                          
                          echo "</table>";
                          echo "</div>";
                          echo "</div>;";
                          
                      }
                      

                //USER DID NOT SELECT RACE YET==================================================================================================
                else { // This is supposed to return the entire list of drivers if no query string, but its currently not working.
                    echo "<div class='d-flex flex-column align-items-center mb-5'>";
                    echo "<h1 class='display-2 fw-bold'>2022 Races</h1>";
                    echo "<h1 class='display-5 fw-light'>Select a list of 2022 races below to being your journey.</h1>";
                    echo "</div>";
                    echo '<div class="table-responsive small">';
                    echo '<table class="table table-striped table-sm">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">GoTo</th>';
                    echo '<th scope="col">Race</th>';
                    echo '<th scope="col">Date</th>';
                    echo '<th scope="col">Url</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    foreach ($races as $race) {
                        //This shows name of race // Bahrian Grand Prix
                        echo "<tr>";
                        echo "<td><a href=browse.php?raceId=$race[raceId]> GO </a>";
                        echo "<td>  $race[rName] </td>";
                        echo "<td> $race[raceDate]</td>";
                        echo "<td> $race[raceUrl]</td>";
                    }  
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                }               
                ?>
            </div>
</body>
</html>
