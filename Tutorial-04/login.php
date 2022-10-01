<?php
session_start();
if ($_SESSION['userInfo']) {
    header("location:result.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Neumorphism Login Form UI</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <div class="content">
        <?php
        define("CUSER", "saw kyaw myint");
        define("CPASSWORD", "777236");
        if (isset($_POST['login'])) {
            session_start();
            $resultArr = [
                "name" => $_POST['user'],
                "password" => $_POST['password']
            ];

            if (!(strtolower($resultArr['name']) == CUSER)) {
                $nameErr = "Name is incorrect!";
            }
            if (!(strtolower($resultArr['password']) == CPASSWORD)) {
                $passwordErr = "Password is incorrect!";
            }
            if (!((strtolower($resultArr['name']) == "saw kyaw myint") && (strtolower($resultArr['password']) == "777236"))) {
                echo "<p class='warning'> Please try again !</p>";
            } else {
                $_SESSION['userInfo'] = $resultArr;
                header("location:result.php");
            }
        }
        ?>
        <div class="text">Login Form</div>
        <form method="post">
            <div class="field">
                <span class="fas fa-user"></span>
                <input type="text" required name="user" value=" <?php echo $_POST['user']; ?>">
            </div>
            <?php echo "<p class='error'>$nameErr</p>"; ?>
            <div class="field">
                <span class="fas fa-lock"></span>
                <input type="password" name="password" value="<?php echo $_POST['password'] ?>">
            </div>
            <?php echo "<p class='error'> $passwordErr </p>"; ?>
            <div class="forgot-pass"><a href="#">Forgot Password?</a></div>
            <button name="login">Login</button>
        </form>
    </div>
</body>

</html>
