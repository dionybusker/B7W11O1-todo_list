<?php
    require_once("includes/functions.php");

    $id = $_GET["id"];

    $task = getTaskById($id);

    // function call deleteTask when submitted, then go back to index.php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        deleteTask($id);

        header("Location: index.php");
        exit;
    }
?>

<!-- require header -->
<?php require_once("includes/header.php") ?>

        <h4>Weet je zeker dat je de taak "<?php echo $task["name"] ?>" wilt verwijderen?</h4>

        <a href="index.php" class="btn btn-dark">Annuleren</a>

        <form class="form" action="<?php echo $_SERVER["PHP_SELF"] ?>?id=<?php echo $id ?>" method="POST">
            <input type="text" value="<?php echo $id ?>" hidden>

            <input type="submit" class="btn btn-danger" value="Taak verwijderen">
        </form>



<!-- require footer -->
<?php require_once("includes/footer.php") ?>