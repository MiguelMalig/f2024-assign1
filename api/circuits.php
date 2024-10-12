<?php
    include_once __DIR__ . "data/db_conn.php";

    header('Content-Type: application/json');

    $conn = Database::createConnection();

    switch(true) {
        case isset($_GET['circuitRef']):
            $circuitRef = $_GET['circuitRef'];
            $results = Database::getData("SELECT * from circuits WHERE circuitRef = ?", $conn, $_GET['circuitRef']);
            break;
        
        default:
            $results = Database::getData("SELECT * FROM circuits", $conn);
    }
echo json_encode($results);
?>