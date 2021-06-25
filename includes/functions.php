<?php

    require_once("dbcon.php");

    /**
     * Fetch all lists from the database
     * 
     * @return array lists entries from database
     */
    function getAllLists() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM lists");
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Fetch all tasks from the database
     * 
     * Dependent on the filter if there is one
     * 
     * @return array tasks entries from database
     */
    function getAllTasks($status = "") {
        $conn = dbcon();

        if (isset($status)) {
            if ($status != "") {
                $query = $conn->prepare("SELECT * FROM tasks WHERE status_id = :filter");
                $query->bindParam(":filter", $status);
            } else {
                $query = $conn->prepare("SELECT * FROM tasks");
            }
        } else {
            $query = $conn->prepare("SELECT * FROM tasks");
        }

        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all statuses from the database
     * 
     * @return array statuses entries from database
     */
    function getAllStatuses() {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM statuses");
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get a specific list based on id
     * 
     * @param int $id - get id from url
     * @return array list data
     */
    function getListById($id) {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM lists WHERE id = :id");
        $query->bindParam(":id", $id);

        $query->execute();

        return $query->fetch();
    }

    /**
     * Get a specific task based on id
     * 
     * @param int $id - get id from url
     * @return array task data
     */
    function getTaskById($id) {
        $conn = dbcon();

        $query = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
        $query->bindParam(":id", $id);

        $query->execute();

        return $query->fetch();
    }

    /**
     * Create a new list and add this data to the database
     * 
     * @param array $data - get data from POST
     */
    function createList($data) {
        $conn = dbcon();

        $query = $conn->prepare("INSERT INTO lists (name) VALUES (:listName)");
        $query->bindParam(":listName", $data["listName"]);
        $query->execute();
    }

    /**
     * Create a new task and add this data to the database
     * 
     * @param array $id - get data from POST
     */
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

    /**
     * Update a list based on id and update the correct data in the database
     * 
     * @param array $id - get id and data from POST
     */
    function updateList($id, $data) {
        $conn = dbcon();

        $query = $conn->prepare("UPDATE lists SET name = :listName WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->bindParam(":listName", $data["listName"]);

        $query->execute();
    }

    /**
     * Update a task based on id and update the correct data in the database
     * 
     * @param int $id - get id from POST
     * @param array $data - get data from POST
     */
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

    /**
     * Delete a task based on which id has been given
     * 
     * @param int $id - get id from POST
     */
    function deleteTask($id) {
        $conn = dbcon();

        $query = $conn->prepare("DELETE FROM tasks WHERE id = :id");
        $query->bindParam(":id", $id);

        $query->execute();
    }

    /**
     * Delete a list based on which id has been given
     * 
     * If a list has one or more tasks, these tasks will automatically be deleted as well
     * 
     * @param int $id - get id from POST
     */
    function deleteList($id) {
        $conn = dbcon();
        
        $query = $conn->prepare("DELETE FROM lists WHERE id = :id; DELETE FROM tasks WHERE list_id = :id");
        $query->bindParam(":id", $id);

        $query->execute();
    }

    /**
     * Order tasks based on what order has been given as parameter
     * 
     * @param array $order - asc or desc
     * @return array ordered tasks data entries
     */
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