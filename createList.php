<?php
    require_once("includes/functions.php");

    // function call createList when submitted, then go back to index.php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        createList($_POST);
        header("Location: index.php");
        exit;
    }
?>

<!-- require header -->
<?php require_once("includes/header.php") ?>
        <a href="index.php" class="btn btn-dark">Ga terug</a>

        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="listName">Lijst naam: </label>
            <input type="text" name="listName">

            <input type="submit" class="btn btn-info" value="Lijst toevoegen">
        </form>


<!-- require footer -->
<?php require_once("includes/footer.php") ?>