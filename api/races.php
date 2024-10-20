<?php
    include_once "../data/db_conn.php";

    header("Content-Type: application/json");
    
    $conn = Database::createConnection();
    //WHEN USER CLICKS SELECTION
    if (isset($_GET['raceId'])) {
        $raceId = $_GET['raceId'];
        $results = Database::getData("SELECT DISTINCT races.raceId, races.circuitId, circuits.name AS cName, races.name AS rName,races.round,circuits.location, circuits.country,races.date AS raceDate,races.url AS raceUrl,drivers.forename,drivers.surname,constructors.constructorRef,qualifying.q1,qualifying.q2,qualifying.q3
                                        FROM races
                                        JOIN circuits ON races.circuitId = circuits.circuitId
                                        JOIN qualifying ON races.raceId = qualifying.raceId 
                                        JOIN drivers ON qualifying.driverID = drivers.driverId
                                        JOIN constructors ON qualifying.constructorId = constructors.constructorId
                                        WHERE races.raceID = ?", $conn, $_GET['raceId']);
    }
    else {

        //WHEN THERES NO SELECTION YET
        $results = Database::getData("SELECT races.raceId, races.round, races.name as rName, circuits.location, circuits.country,races.date AS raceDate,races.url AS raceUrl
                                        FROM races
                                        JOIN circuits ON races.circuitId = circuits.circuitId
                                        JOIN seasons ON races.year = seasons.year
                                        WHERE seasons.year = 2022
                                        ORDER BY races.round ASC", $conn);
    }
echo json_encode($results);
  //  }
?>
