<?php
    include __DIR__ . "data/db_conn.php";

    header('Content-Type: application/json');

    $conn = Database::createConnection();

    switch(true) {
        case isset($_GET['circuitRef']):
            $circuitRef = $_GET['circuitRef'];
            $results = Database::getData("SELECT * from circuits WHERE circuitRef = ?", $_GET['circuitRef'], $conn);
            break;
        
        default:
            $results = Database::getData("SELECT * FROM circuits", $conn);
    }
echo json_encode($results);
?>