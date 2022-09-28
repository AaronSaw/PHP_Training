<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Chess</h1>
    <table  cellspacing="0px" cellpadding="0px" style="border: 3px solid ;">

        <?php
        for ($row = 1; $row <= 8; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= 8; $col++) {
                $total = $row + $col;
                if ($total % 2 == 0) {
                    echo "<td height=50px width=50px bgcolor=#FFFFFF></td>";
                } else {
                    echo "<td height=50px width=50px bgcolor=#000000></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>