<?php
    include_once "../data/db_conn.php";

    header("Content-Type: application/json");

    $conn = Database::createConnection();

    if (isset($_GET['raceId'])) {
        $raceId = $_GET['raceId'];
        $results = Database::getData("SELECT results.raceId, results.driverId, results.constructorId, drivers.forename, drivers.surname, results.position, races.year, races.round, races.date, constructors.name, constructors.constructorRef, constructors.nationality
                                        FROM results
                                        JOIN drivers ON results.driverId = drivers.driverId
                                        JOIN races ON results.raceId = races.raceId
                                        JOIN constructors ON results.constructorId = constructors.constructorId
                                        WHERE results.raceId = ?
                                        ORDER BY results.grid  ASC", $conn, $_GET['raceId']);
    } 
    else {
        // Don't think we need this since instructions doesn't specify to give all of the qualifying table if no query string.
        //WHEN THERES NO SELECTION YET
        $results = Database::getData("SELECT results.raceId, results.driverId, results.constructorId, drivers.forename, drivers.surname, results.position, races.year, races.round, races.date, constructors.name, constructors.constructorRef, constructors.nationality
                                        FROM results
                                        JOIN drivers ON results.driverId = drivers.driverId
                                        JOIN races ON results.raceId = races.raceId
                                        JOIN constructors ON results.constructorId = constructors.constructorId
                                        ORDER BY results.grid  ASC", $conn);
    }
echo json_encode($results);
?>