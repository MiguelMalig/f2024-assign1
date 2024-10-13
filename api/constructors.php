<?php
    include_once "../data/db_conn.php";

    header('Content-Type: application/json');

    $conn == Database::createConnection();

    switch (true) {
        case isset($_GET['constructorRef']):
            $circuitRef = $_GET['constructorRef'];
            $results = Database::getData("SELECT * from constructors WHERE constructorRef = ?", $conn, $_GET['constructorRef']);
            break;
        default:
            $results = Database::getData("SELECT * from constructors", $conn);
    }
echo json_encode($results);
?>