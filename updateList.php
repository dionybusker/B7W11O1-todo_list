<?php
    require_once("includes/functions.php");

    $id = $_GET["id"];
    $list = getListById($id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        updateList($id, $_POST);

        header("Location: index.php");
    }

?>

<!-- require header -->
<?php require_once("includes/header.php") ?>

        <form class="form" action="<?php echo $_SERVER["PHP_SELF"] ?>?id=<?php echo $id ?>" method="POST">

            <div class="form-group">
                <label class="col-1" for="listName">Naam aanpassen</label>
                <input class="col-2" type="text" name="listName" value="<?php echo $list["name"] ?>">
            </div>

            <input type="text" value="<?php echo $id ?>" hidden>

            <input type="submit" class="btn btn-info">
        </form>

<!-- require footer -->
<?php require_once("includes/footer.php") ?>