<?php
    require_once("includes/functions.php");

    $lists = getAllLists();
    $tasks = getAllTasks();
    $statuses = getAllStatuses();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <a href="createList.php" class="btn btn-info">Nieuwe lijst</a>
        <div class="row col-12">
            <?php foreach ($lists as $list) { ?>

            <div class="card col-3 m-1">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $list["name"] ?></h4>
                    <p class="card-text">
                        <?php
                            foreach ($tasks as $task) {
                                if ($task["list_id"] == $list["id"]) {
                        ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <span class="font-weight-bold">Taak: </span>
                                                <?php echo $task["name"]; ?> <br>

                                                <span class="font-weight-bold">Beschrijving: </span>
                                                <?php echo $task["description"] ?> <br>

                                                <span class="font-weight-bold">Tijdsduur: </span>
                                                <?php echo $task["duration"] ?> minuten <br>

                                                <span class="font-weight-bold">Status: </span>
                                                <?php foreach ($statuses as $status) {
                                                    if ($task["status_id"] == $status["id"]) {
                                                        echo $status["name"];
                                                    }
                                                } ?>
                                                
                                            </p>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                    </p>
                </div>
            </div>

            <?php } ?>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>