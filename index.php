<?php
    require_once("includes/functions.php");

    // function calls
    $lists = getAllLists();
    $tasks = getAllTasks();
    $statuses = getAllStatuses();

    // get order from url and change to asc or desc
    $order = isset($_GET["order"]) && strtolower($_GET["order"]) == "desc" ? "DESC" : "ASC";
    $orderSort = $order == "ASC" ? "desc" : "asc";

    // function call orderTasks if order has been set
    if (isset($_GET["order"])) {
        $tasks = orderTasks($_GET["order"]);
    }

    // function call getAllTasks when submitted (this is for the filter on statuses)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tasks = getAllTasks($_POST);
    }
?>

<!-- require header -->
<?php require_once("includes/header.php") ?>

        <a href="createList.php" class="btn btn-success">Nieuwe lijst maken</a>

        <a href="index.php" class="btn btn-info float-right"><i class="fas fa-sync-alt"></i></a>

        <form class="form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <label for="status">Filteren op status: </label>
            <select name="status" id="status">
                <option value="">Geen filter</option>
                <?php foreach ($statuses as $status) { ?>
                    <option value="<?php echo $status["id"] ?>" <?php if (isset($_POST["status"]) && $_POST["status"] == $status["id"]) { echo "selected"; } ?>>
                        <?php echo $status["name"] ?>
                    </option>
                <?php } ?>
            </select>

            <input type="submit" class="btn btn-info" value="Filteren">
        </form>
        
        <div class="row col-12">


            <?php foreach ($lists as $list) { ?>
            <div class="card col-4 m-0 p-0">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $list["name"] ?></h4>

                    <div class="card-text">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Taak</th>
                                    <th>Beschrijving</th>
                                    <th class="pr-0">
                                        Duur
                                        <a href="index.php?order=<?php echo $orderSort ?>">
                                            <?php if ($orderSort == "asc") { ?>
                                                <i class="fas fa-sort-up"></i>
                                            <?php } elseif ($orderSort == "desc") { ?>
                                                <i class="fas fa-sort-down"></i>
                                            <?php } ?>
                                        </a>
                                    </th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($tasks as $task) { 
                                        if ($task["list_id"] == $list["id"]) {
                                ?>
                                <tr>
                                    <td><?php echo $task["id"] ?></td>
                                    <td><?php echo $task["name"] ?></td>
                                    <td><?php echo $task["description"] ?></td>
                                    <td><?php echo $task["duration"] ?> minuten</td>
                                    <td>
                                        <?php
                                            foreach ($statuses as $status) {
                                                if ($task["status_id"] == $status["id"]) {
                                                    echo $status["name"];
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td class="px-0"><a href="updateTask.php?id=<?php echo $task["id"] ?>" class="text-info"><i class="fas fa-edit"></i></a></td>
                                    <td class="px-0"><a href="deleteTask.php?id=<?php echo $task["id"] ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>

                        <div class="row col-12">
                            <div class="mx-auto">
                                <a href="createTask.php?id=<?php echo $list["id"] ?>" class="btn btn-success">Taak toevoegen</a>
                                <a href="updateList.php?id=<?php echo $list["id"] ?>" class="btn btn-info">Lijst updaten</a>
                                <a href="deleteList.php?id=<?php echo $list["id"] ?>" class="btn btn-danger">Lijst verwijderen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
        
<!-- require footer -->
<?php require_once("includes/footer.php") ?>