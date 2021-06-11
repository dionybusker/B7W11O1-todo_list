<?php

    require_once("dbcon.php");

    function getAllLists() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM lists");
        $query->execute();

        return $query->fetchAll();
    }

    function getAllTasks() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM tasks");
        $query->execute();

        return $query->fetchAll();
    }