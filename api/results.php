<?php
    include_once "../data/db_conn.php";

    header("Content-Type: application/json");

    $conn = Database::createConnection();

    if (isset($_GET['raceId'])) {
        $raceId = $_GET['raceId'];
        $results = Database::getData("SELECT results.raceId, results.driverId, results.constructorId, drivers.driverRef, drivers.forename, drivers.surname, results.position, races.year, races.round, races.date, constructors.name, constructors.constructorRef, constructors.nationality,results.laps,results.points
                                        FROM results
                                        JOIN drivers ON results.driverId = drivers.driverId
                                        JOIN races ON results.raceId = races.raceId
                                        JOIN constructors ON results.constructorId = constructors.constructorId
                                        WHERE results.raceId = ?
                                        ORDER BY results.position  ASC", $conn, $_GET['raceId']);
    }

    // I Can change this ONLY BEING USED IN DRIVERS 
    else if (isset($_GET['driverRef'])) {
        $raceId = $_GET['driverRef'];
        /*constructor unecessary join*/
        $results = Database::getData("SELECT results.driverId, results.position,results.laps,results.points,races.round,circuits.name AS cName, races.year
                                        FROM results
                                        JOIN drivers ON results.driverId = drivers.driverId
                                        JOIN races ON results.raceId = races.raceId
                                        JOIN circuits ON races.circuitId = circuits.circuitId
                                        WHERE drivers.driverRef = ? AND races.year = 2022
                                        ORDER BY races.round",
                                        $conn, $_GET['driverRef']);
    }
    else if (isset($_GET['constructorRef'])) {
        $constructorRef = $_GET['constructorRef'];
        $results = Database::getData("SELECT races.round, races.name AS circuit, drivers.forename, drivers.surname, results.position, results.points, races.year, constructors.name, constructors.nationality, constructors.url
                                        FROM results
                                        JOIN races ON results.raceId = races.raceId
                                        JOIN drivers ON results.driverId = drivers.driverId
                                        JOIN constructors ON results.constructorId = constructors.constructorId
                                        WHERE constructors.constructorRef = ? AND races.year = 2022
                                        ORDER BY races.round ASC", $conn, $_GET['constructorRef']);
    }
    else {
        // Don't think we need this since instructions doesn't specify to give all of the qualifying table if no query string.
        //WHEN THERES NO SELECTION YET
        $results = Database::getData("SELECT results.raceId, results.driverId, results.constructorId, drivers.forename, drivers.surname, results.position, races.year, races.round, races.date, constructors.name, constructors.constructorRef, constructors.nationality
                                        FROM results
                                        JOIN drivers ON results.driverId = drivers.driverId
                                        JOIN races ON results.raceId = races.raceId
                                        JOIN constructors ON results.constructorId = constructors.constructorId
                                        ORDER BY results.position  ASC", $conn);
    }
echo json_encode($results);
?>