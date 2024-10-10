<?php

define('CONN', 'sqlite:./data/f1.db'); //moved ur constants up

class Database {
    
    function createConnection() {
       
        $user = "username";
        $pass = "password";
        try {
            $pdo = new PDO(CONN, $user, $pass);
        }
        catch(PDOException $e) { //Original --> catch(PDOConnection $e) --> it's giving me an error so i'm changing it to --> PDOException $e
            echo "Connection error";
            echo $e -> getMessage();
        }
        return $pdo;
    }

    function getData($sql, , $pdo , $parameters = null) {
        try {

            // if no parameters are passed, return data from sql statement.
            if ($parameters === null) {
                $result = $pdo -> query($sql);
                return $result -> fetchAll(PDO::FETCH_ASSOC); // Original--> return $result -> fetchAll(FETCH_ASSOC);  --> I changed it to --> fetchAll(PDO::FETCH_ASSOC);
            }
            else { // if there is parameters passed, enter else statement.

                // if its not an array, make it an array, which is safe to say that if it hits this if function, then its a single parameter..
                if (!is_array($parameters)) { 
                    $parameters = [$parameters];
                }
                // if there is a passed parameter or more, go through the parameter array and put it inside a sql statement.
                if (count($parameters) > 0) {
                    $statement = $pdo -> prepare($sql);
                    for ($i = 0; $i < count($parameters); $i++) {
                        $statement -> bindValue($i+1, $parameters[$i]);
                    }
                    $statement -> execute();
                    return $statement -> fetchAll(PDO::FETCH_ASSOC);  // Original --> return $result -> fetchAll(FETCH_ASSOC);  --> I changed it to --> PDO::FETCH_ASSOC
                }
            }
            // $result = $pdo => query($sql);
            // $data = $result = fetchAll(FETCH_ASSOC);
            // return $data;    
            // Keeping this here just in case the prepared statement modification doesn't work above.
        }
        catch (PDOException $e) { //Original --> catch(PDOConnection $e) --> it's giving me an error so i'm changing it to --> PDOException $e
            return null;
        }
    }
}

