<?php
include_once "../data/db_conn.php";

header('Content-Type: application/json');

$conn = Database::createConnection();

switch (true) {
    // if driver is passed as a query string..
    case isset($_GET['driverRef']):
        $driverRef = $_GET['driverRef'];
        $results = Database::getData("SELECT * from drivers WHERE driverRef= ?", $conn, $_GET['driverRef']);
        break;

    // if race is passed as a query string..
    case isset($_GET['raceID']):
        $race = $_GET['raceID'];
        $results = Database::getData("SELECT raceID, driverRef, code, forename, surname, dob, nationality, url from results 
                            RIGHT JOIN drivers on results.driverId=drivers.driverId 
                            WHERE results.raceID= ?", $conn, $_GET['raceID']);
        break;

    // if not query string passed, then return all drivers from database..
    default:
        $results = Database::getData("SELECT * FROM drivers", $conn);
        break;
}
echo json_encode($results);
?>
