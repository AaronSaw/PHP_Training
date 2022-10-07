<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login Form</title>
</head>

<body>
    <?php
    include('connect/connection.php');
    //   require "table.php"; YOU CALL ONE TIME
    session_start();
    if (isset($_SESSION['mail'])) {
        header("location:result.php");
    }
    if (isset($_POST["login"])) {
        $email = mysqli_real_escape_string($connect, trim($_POST['email']));
        $password = trim($_POST['password']);
        $sql = mysqli_query($connect, "SELECT * FROM login where email = '$email'");
        $count = mysqli_num_rows($sql);
        $fetch = mysqli_fetch_assoc($sql);
        $hashpassword = $fetch["password"];
        if (empty($password)) {
            $passwordErr = "Please fill password!";
        }
        if (empty($_POST['email'])) {
            $emailErr = "Please fill email!";
        } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else
             if ($count == 0) {
            $emailErr = "Your email is not Register";
        } else  if (password_verify($password, $hashpassword)) {
            $_SESSION['mail'] = $_POST['email'];
    ?>
            <script>
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Login Success',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(() => {
                    window.location.replace('result.php');
                }, 1600);
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Email password invaild.',
                });
            </script>
            <?php
        }

        if ($count > 0) {
            if ($fetch["status"] == 0) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please verify email account before login.',
                    });
                </script>
    <?php
            }
        }
    }
    ?>

    <center>
        <nav>
            <h1> <a class="navbar-brand" href="#">Login Form</a></h1>
            <ul>
                <li>
                    <a href="index.php">Login</a>
                </li>
                <li>
                    <a href="register.php">Register</a>
                </li>
            </ul>
        </nav>

        <main class="login-form">
            <h1>Login</h1>
            <form action="#" method="POST" name="login">
                <label for="email_address" class="">E-Mail Address</label><br>
                <input type="text" id="email_address" name="email" value="<?php echo $_POST['email']; ?>" autofocus><br>
                <?php echo "<p class='error'>$emailErr</p>"; ?>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" value="<?php echo $_POST['password']; ?>"><br>
                <?php echo "<p class='error'>$passwordErr</p>"; ?>
                <input type="submit" value="Login" name="login"><br>
                <a href="recover_psw.php">
                    Forgot Password?
                </a>
            </form>
        </main>
    </center>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
