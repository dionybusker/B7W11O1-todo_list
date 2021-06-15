<?php
    require_once("includes/functions.php");
    $lists = getAllLists();
    $statuses = getAllStatuses();

    $id = $_GET["id"];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $taskName = $_POST["taskName"];
        // $description = $_POST["description"];
        // $duration = $_POST["duration"];
        // $list = $_POST["lists"];
        
        
        createTask($_POST);
        header("Location: index.php");
    }
?>

<!-- require header -->
<?php require_once("includes/header.php") ?>


        <?php echo $id ?>
        <form class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label class="col-1" for="taskName">Taak naam: </label>
                <input class="col-2" type="text" name="taskName"> <br>
            </div>

            <div class="form-group">
                <label class="col-1" for="description">Beschrijving: </label>
                <input class="col-2" type="text" name="description"> <br>
            </div>

            <div class="form-group">
                <label class="col-1" for="duration">Tijdsduur: </label>
                <input class="col-2" type="text" name="duration"> <br>
            </div>

            <div class="form-group">
                <label class="col-1" for="list">Selecteer lijst</label>
                <select class="col-2" name="list" id="list">
                    <?php foreach ($lists as $list) { ?>
                        <option value="<?php echo $list["id"] ?>" <?php if ($list["id"] == $id) { echo "selected"; } ?>>
                            <?php echo $list["name"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label class="col-1" for="status">Selecteer status</label>
                <select class="col-2" name="status" id="status">
                    <?php foreach ($statuses as $status) { ?>
                        <option value="<?php echo $status["id"] ?>"><?php echo $status["name"] ?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" class="btn btn-info">
        </form>

<!-- require footer -->
<?php require_once("includes/footer.php") ?>