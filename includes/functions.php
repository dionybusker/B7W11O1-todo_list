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

        $query = $conn->prepare("SELECT lists.*, tasks.*
                                 FROM tasks, lists
                                 WHERE lists.id = tasks.list_id");
        $query->execute();

        return $query->fetchAll();
    }