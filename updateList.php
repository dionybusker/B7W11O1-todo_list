<?php
    require_once("includes/functions.php");

    $id = $_GET["id"];
    $list = getListById($id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        updateList($id, $_POST);

        header("Location: index.php");
    }

?>

<?php require_once("includes/header.php") ?>


        <?php echo $list["name"] ?>

        
        <form class="form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

            <div class="form-group">
                <label class="col=1" for="listName">Naam aanpassen</label>
                <input class="col-2" type="text" value="<?php echo $list["name"] ?>">
            </div>

            <input type="text" value="<?php echo $list["id"] ?>" hidden>

            <input type="submit" class="btn btn-info">
        </form>

<?php require_once("includes/footer.php") ?>