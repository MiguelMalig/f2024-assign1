<?php
    include_once "../data/db_conn.php";

    header("Content-Type: application/json");

    $conn = Database::createConnection();

    if (isset($_GET['raceId'])) {
        $raceId = $_GET['raceId'];
        $results = Database::getData("SELECT qualifying.raceId, qualifying.driverId, qualifying.constructorId, drivers.forename, drivers.surname, qualifying.q1, qualifying.q2, qualifying.q3, qualifying.position 
                                        FROM qualifying
                                        JOIN drivers ON qualifying.driverId = drivers.driverId
                                        WHERE qualifying.raceId = ?
                                        ORDER BY qualifying.position  ASC", $conn, $_GET['raceId']);
    } 
    else {
        // Don't think we need this since instructions doesn't specify to give all of the qualifying table if no query string.
        //WHEN THERES NO SELECTION YET
        $results = Database::getData("SELECT qualifying.raceId, qualifying.driverId, qualifying.constructorId, drivers.forename, drivers.surname, qualifying.q1, qualifying.q2, qualifying.q3, qualifying.position 
                                        FROM qualifying
                                        JOIN drivers ON qualifying.driverId = drivers.driverId
                                        ORDER BY qualifying.position  ASC", $conn);
    }
echo json_encode($results);
  //  }
?>