<?php
    require_once("includes/functions.php");

    $lists = getAllLists();
    $tasks = getAllTasks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach ($lists as $list) { ?>
        <li>
            <?php echo $list["name"] ?>
            <ul>
            <?php foreach ($tasks as $task) { ?>
                <li>
                    <?php echo $task["name"] ?>
                </li>
            <?php } ?>
            </ul>
        </li>
        <?php } ?>
    </ul>
</body>
</html>