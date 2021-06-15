<?php
    require_once("includes/functions.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        createList($_POST);
        header("Location: index.php");
    }
?>

<?php require_once("includes/header.php") ?>

        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="listName">Lijst naam: </label>
            <input type="text" name="listName">

            <input type="submit" class="btn btn-info">
        </form>


<?php require_once("includes/footer.php") ?>