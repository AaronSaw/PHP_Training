<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Age Calculate</title>
</head>

<body>
    <?php
    /**
     * Show age 
     * @param $bdday
     * @param $today
     * @return $age
     */
    function age($bdday, $today)
    {
        $birthday = date_diff($today, $bdday);
        return "<h4>Your age is : <span>$birthday->y  years  $birthday->m  months $birthday->d days</span> </h4>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['user'];
        $oldDate = $_POST['date'];
        $bdday = new DateTime($_POST['date']);
        $today = new DateTime(date('d.m.y'));
        if (empty($_POST["date"])) {
            $dateErr = "Plase choose date!";
        } else
              if ($bdday > $today || $bdday == $today) {
            $dateErr = "Plase choose correct date!";
        } else
              if ($bdday < $today) {
            $user = " ";
            $oldDate = " ";
            $name = "<h4>Name : <span>" . $_POST['user'] . "</span> </h4>";
            $age = age($today, $bdday);
        }
    }
    ?>
    <div class="card">
        <h1>Age Calculator</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" placeholder="Your Name" name="user" required value="<?php echo $user; ?>"><br>
            <input type="date" name="date" value="<?php echo $oldDate; ?>"><br>
            <?php echo "<p class='error'>$dateErr </p>"; ?>
            <button name="submit">submit</button>
        </form>
        <br>
        <div class="card-result">
            <?php echo $name ?>
            <?php echo  $age; ?>
        </div>
    </div>
</body>

</html>
