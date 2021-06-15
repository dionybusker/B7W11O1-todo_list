<?php
    require_once("includes/functions.php");

    $id = $_GET["id"];

    $list = getListById($id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        deleteList($id);

        header("Location: index.php");
    }
?>

<!-- require header -->
<?php require_once("includes/header.php") ?>

        <p>Weet je zeker dat je de lijst "<?php $list["name"] ?>" wilt verwijderen? Alle taken worden dan ook verwijderd. </p>

        <a href="index.php" class="btn btn-info">Annuleren</a>

        <form class="form" action="<?php $_SERVER["PHP_SELF"] ?>?id=<?php echo $id ?>" method="POST">
            <input type="text" value="<?php echo $id ?>" hidden>

            <input type="submit" class="btn btn-danger" value="Verwijderen">
        </form>

<!-- require footer -->
<?php require_once("includes/footer.php") ?>