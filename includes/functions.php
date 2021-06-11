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

    function getAllStatuses() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM statuses");
        $query->execute();

        return $query->fetchAll();
    }

    function createList($listName) {
        $conn = dbcon();

        $query = $conn->prepare("INSERT INTO lists (name) VALUES (:listName)");
        $query->bindParam(":listName", $listName);
        $query->execute();
    }

    function createTask($taskName, $description, $duration) {
        $conn = dbcon();

        $query = $conn->prepare("INSERT INTO tasks (name, description, duration) VALUES (:taskName, :description, :duration)");
        $query->bindParam(":taskName", $taskName);
        $query->bindParam(":description", $description);
        $query->bindParam(":duration", $duration);
        $query->execute();
    }