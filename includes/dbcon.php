<?php

    // connection with the database
    function dbcon() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "b7w11o1-todo_list";
        $conn = NULL;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
        }

        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }