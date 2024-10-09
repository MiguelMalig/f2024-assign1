<?php
include __DIR__ . "data/db_conn.php";

header('Content-Type: application/json');

$driver = getData("SELECT driverRef from drivers"); // don't know why I put this here, going to keep it just in case I remember why..


switch (true) {
    // if driver is passed as a query string..
    case isset($_GET['driverRef']):
        $driverRef = $_GET['driverRef'];
        $results = Database::getData("SELECT * from drivers WHERE driverRef= ?", $_GET['driverRef']);
        break;

    // if race is passed as a query string..
    case isset($_GET['raceID']):
        $race = $_GET['raceID'];
        $results = getData("SELECT raceID, driverRef, code, forename, surname, dob, nationality, url from results 
                            RIGHT JOIN drivers on results.driverId=drivers.driverId 
                            WHERE results.raceID= ?", $_GET['raceID']);
        break;

    // if not query string passed, then return all drivers from database..
    default:
        $results = getData("SELECT * FROM drivers");
        break;
}
echo json_encode($results);
?>
