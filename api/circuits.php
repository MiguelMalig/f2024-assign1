<?php
    include __DIR__ . "data/db_conn.php";

    header('Content-Type: application/json');

    switch(true) {
        case isset($_GET['circuitRef']):
            $circuitRef = $_GET['circuitRef'];
            $results = Database::getData("SELECT * from circuits WHERE circuitRef = ?", $_GET['circuitRef']);
            break;
        
        default:
            $results = Database::getData("SELECT * FROM circuits");
    }
echo json_encode($results);
?>