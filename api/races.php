<?php
    include_once __DIR__ . "data/db_conn.php";

    header("Content-Type: application/json");

    $conn = Database::createConnection();

    if (isset($_GET['raceId'])) {
        $raceId = $_GET['raceId'];
        $results = Database::getData("SELECT races.raceId, races.circuitId, circuits.name, circuits.location, circuits.country
                                        FROM races
                                        JOIN circuits ON races.circuitId = circuits.circuitId
                                        WHERE races.raceID = ?", $conn, $_GET, $_GET['raceId']);
    }
    else {
        $results = Database::getData("SELECT races.raceId, races.round, circuits.name, circuits.location, circuits,country
                                        FROM races
                                        JOIN circuits ON races.circuitId = circuits.circuitId
                                        JOIN seasons ON races.year = seasons.year
                                        WHERE seasons.year = 2022
                                        ORDER BY races.round ASC", $conn);
    }
echo json_encode($results);
?>
