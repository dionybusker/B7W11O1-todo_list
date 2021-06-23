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

        if (isset($_POST["status"])) {
            if ($_POST["status"] != "") {
                $query = $conn->prepare("SELECT * FROM tasks WHERE status_id = :filter");
                $query->bindParam(":filter", $_POST["status"]);
            } else {
                $query = $conn->prepare("SELECT * FROM tasks");
            }
        } else {
            $query = $conn->prepare("SELECT * FROM tasks");
        }

        $query->execute();

        return $query->fetchAll();
    }

    function getAllStatuses() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM statuses");
        $query->execute();

        return $query->fetchAll();
    }

    function getListById($id) {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM lists WHERE id = :id");
        $query->bindParam(":id", $id);

        $query->execute();

        return $query->fetch();
    }

    function getTaskById($id) {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
        $query->bindParam(":id", $id);

        $query->execute();

        return $query->fetch();
    }

    function createList($data) {
        $conn = dbcon();

        $query = $conn->prepare("INSERT INTO lists (name) VALUES (:listName)");
        $query->bindParam(":listName", $data["listName"]);
        $query->execute();
    }

    function createTask($data) {
        $conn = dbcon();

        $query = $conn->prepare("INSERT INTO tasks (name, description, duration, list_id, status_id) VALUES (:taskName, :description, :duration, :list_id, :status_id)");
        $query->bindParam(":taskName", $data["taskName"]);
        $query->bindParam(":description", $data["description"]);
        $query->bindParam(":duration", $data["duration"]);
        $query->bindParam(":list_id", $data["list"]);
        $query->bindParam(":status_id", $data["status"]);

        $query->execute();
    }

    function updateList($id, $data) {
        $conn = dbcon();

        $query = $conn->prepare("UPDATE lists SET name = :listName WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->bindParam(":listName", $data["listName"]);

        $query->execute();
    }

    function updateTask($id, $data) {
        $conn = dbcon();

        $query = $conn->prepare("UPDATE tasks SET name = :taskName, description = :description, duration = :duration, list_id = :list_id, status_id = :status_id WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->bindParam(":taskName", $data["taskName"]);
        $query->bindParam(":description", $data["description"]);
        $query->bindParam(":duration", $data["duration"]);
        $query->bindParam(":list_id", $data["list"]);
        $query->bindParam(":status_id", $data["status"]);

        $query->execute();
    }

    function deleteTask($id) {
        $conn = dbcon();

        $query = $conn->prepare("DELETE FROM tasks WHERE id = :id");
        $query->bindParam(":id", $id);

        $query->execute();
    }

    function deleteList($id) {
        $conn = dbcon();
        
        $query = $conn->prepare("DELETE FROM lists WHERE id = :id; DELETE FROM tasks WHERE list_id = :id");
        $query->bindParam(":id", $id);

        $query->execute();
    }

    function orderTasks($order) {
        $conn = dbcon();

        if ($order == "asc") {
            $query = $conn->prepare("SELECT * FROM tasks ORDER BY duration ASC");
            $query->execute();
    
            return $query->fetchAll();
        } elseif ($order == "desc") {
            $query = $conn->prepare("SELECT * FROM tasks ORDER BY duration DESC");
            $query->execute();
    
            return $query->fetchAll();
        }

    }