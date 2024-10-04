<?php
    define(conn, "sqlite:" .__DIR__ . "/data/f1.db");
    $user = "username";
    $pass = "password";

    try {
        $pdo = new PDO(conn, $user, $pass);


    }
    catch(PDOConnection $e) {
        echo "Connection error";
        echo $e -> getMessage();
    }


    function getData($sql, $parameters = null); {
        try {
            global $pdo;

            // if no parameters are passed, return data from sql statement.
            if ($parameters === null) {
                $result = $pdo -> query($sql);
                return $result -> fetchAll(FETCH_ASSOC);
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
                    $statement => execute();
                    return $statement -> fetchAll(FETCH_ASSOC);
                }
            }
            // $result = $pdo => query($sql);
            // $data = $result = fetchAll(FETCH_ASSOC);
            // return $data;    
            // Keeping this here just in case the prepared statement modification doesn't work above.
        }
        catch (PDOExcpetion $e) {
            return null;
        }
    }

