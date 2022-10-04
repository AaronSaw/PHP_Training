<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>image/upload</title>
</head>

<body>
    <center>
        <form action="save.php" method="post" enctype="multipart/form-data">
            <h1 for="">Image Upload</h1>
            <br>
            <?php print_r($_GET['selectedImg']) ?>
            <input type="file" accept="png/jpg" name="upload[]" value="<?php var_dump($_GET['selectedImg']); ?>" multiple>
            <br>
            <br>
            <?php echo "<p class='error'>" . $_GET['error'] . "</p> "; ?>
            <br>
            <input type="text" name="folderName" placeholder="create folder" value="<?php echo $_GET['folder']; ?>">
            <br>
            <br>
            <br>
            <?php echo "<p class='error'>" . $_GET['folderErr'] . "</p> "; ?>
            <br>
            <br>
            <button>upload</button>
        </form>
    </center>
</body>

</html>
