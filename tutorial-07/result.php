<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <center>
        <a href="index.php" class="primary">add image</a>
        <br>
        <br>
        <table border="1" cellspacing="0px" cellpadding="0px">
            <h2>QR List</h2>
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $gallery = scandir("img/");
                $text = $_GET['text'];
                foreach ($gallery as $key => $val) {
                    if ($key > 1) {
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo "img/$val"; ?></td>
                            <td><img src="img/<?php echo $val; ?>" alt=""></td>
                            <td>
                                <a href="delete.php?delName=img/<?php echo $val  ?>" class="del">delete</a>
                                <a href="update.php?text=<?php echo str_replace('.png', '', $val); ?>&id=<?php echo $i; ?>&delName=img/<?php echo $val; ?>" class="warning">update</a>
                            </td>

                        </tr>
                <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </center>
</body>

</html>
