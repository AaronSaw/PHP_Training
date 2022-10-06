<?php
require 'function/function.php';
 ?>
 <link rel="stylesheet" href="css/style.css">
 <a href="student.php" class="warning">create data</a>
 <br>
 <br>
<table border="1" cellspacing="0px" cellpadding="0px">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Room</th>
            <th>Adress</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            foreach (students() as $c) {
            ?>
                <tr>
                    <td><?php echo $c['id'] ?></td>
                    <td><?php echo $c['name'] ?></td>
                    <td><?php echo $c['age'] ?></td>
                    <td><?php echo $c['gender'] ?></td>
                    <td><?php echo $c['room'] ?></td>
                    <td><?php echo $c['address'] ?></td>
                    <td>
                        <div class="d-flex">
                        <a href="student_delete.php?id=<?php echo $c['id']; ?>" class="del" onclick="return confirm('Are u sure to delete?')"> del</a>
                        <a href="student_edit.php?id=<?php echo $c['id']; ?>" class="warning">edit</a>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
