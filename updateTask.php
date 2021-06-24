<?php
    require_once("includes/functions.php");

    $id = $_GET["id"];
    $task = getTaskById($id);

    $lists = getAllLists();
    $statuses = getAllStatuses();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        updateTask($id, $_POST);

        header("Location: index.php");
        exit;
    }

?>

<!-- require header -->
<?php require_once("includes/header.php") ?>
        <a href="index.php" class="btn btn-dark">Ga terug</a>
        
        <form class="form" action="<?php echo $_SERVER["PHP_SELF"] ?>?id=<?php echo $id ?>" method="POST">

            <div class="form-group">
                <label class="col-1" for="taskName">Taak aanpassen</label>
                <input class="col-2" type="text" name="taskName" value="<?php echo $task["name"] ?>">
            </div>

            <div class="form-group">
                <label class="col-1" for="description">Beschrijving</label>
                <input class="col-2" type="text" name="description" value="<?php echo $task["description"] ?>">
            </div>

            <div class="form-group">
                <label class="col-1" for="duration">Tijdsduur</label>
                <input class="col-2" type="text" name="duration" value="<?php echo $task["duration"] ?>">
            </div>

            <div class="form-group">
                <label class="col-1" for="list">Lijst</label>
                <select name="list" id="list">
                    <?php foreach ($lists as $list) { ?>
                        <option value="<?php echo $list["id"] ?>" <?php if ($list["id"] == $task["list_id"]) { echo "selected"; } ?>>
                            <?php echo $list["name"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label class="col-1" for="status">Status</label>
                <select name="status" id="status">
                    <?php foreach ($statuses as $status) { ?>
                        <option value="<?php echo $status["id"] ?>" <?php if ($status["id"] == $task["status_id"]) { echo "selected"; } ?>>
                            <?php echo $status["name"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <input type="text" value="<?php echo $id ?>" hidden>

            <input type="submit" class="btn btn-info" value="Taak updaten">
        </form>

<!-- require footer -->
<?php require_once("includes/footer.php") ?>