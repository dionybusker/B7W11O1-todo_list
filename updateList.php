<?php
    require_once("includes/functions.php");

    $id = $_GET["id"];
    $list = getListById($id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        updateList($id, $_POST);

        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/8eccf2802e.js" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>

        <?php echo $list["name"] ?>

        
        <form class="form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

            <div class="form-group">
                <label class="col=1" for="listName">Naam aanpassen</label>
                <input class="col-2" type="text" value="<?php echo $list["name"] ?>">
            </div>

            <input type="text" value="<?php echo $list["id"] ?>" hidden>

            <input type="submit" class="btn btn-info">
        </form>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
    </body>
</html>