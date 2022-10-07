<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Register Form</title>
</head>

<body>

    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();
    if (isset($_SESSION['mail'])) {
        header("location:result.php");
    }
    include('connect/connection.php');
    $emailErr = "";
    $passwordErr = "";
    $passwordExit = "";
    if (isset($_POST["register"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM login where email ='$email'";
        $check_query = mysqli_query($connect, $sql);
        $rowCount = mysqli_num_rows($check_query);
        if (empty($password)) {
            $passwordErr = "Please fill password";
        }
        if (empty($email)) {
            $emailErr = "Please fill  email !";
        } else
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else    
        if (!empty($email) && !empty($password)) {
            if ($rowCount > 0) {
                $passwordExit = "<p class='exitErr'>Email Exit,Please login!</p>";
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $result = mysqli_query($connect, "INSERT INTO login (email, password, status) VALUES ('$email', '$password_hash', 0)");

                if ($result) {
                    $otp = rand(100000, 999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;

                    //Load Composer's autoloader
                    require 'vendor/autoload.php';

                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'sawkyaw7777777@gmail.com';
                    $mail->Password   = 'iydzhfxzyxpgxpwo';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('sawkyaw7777777@gmail.com', 'Your otp code');
                    $mail->addAddress($_POST["email"]);

                    $mail->isHTML(true);
                    $mail->Subject = "Your verify code";
                    $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>";

                    if (!$mail->send()) {
    ?>

                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Email Error',
                                text: 'Something went wrong!',
                            })
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(() => {
                                window.location.replace('verification.php');
                            }, 1600);
                        </script>
    <?php
                    }
                }
            }
        }
    }
    ?>

    <nav>
        <h1><a class="navbar-brand" href="#">Register Form</a></h1>
        <ul>
            <li>
                <a class="nav-link" href="index.php">Login</a>
            </li>
            <li>
                <a class="nav-link" href="register.php" style="font-weight:bold; color:black; text-decoration:underline">Register</a>
            </li>
        </ul>
    </nav>
    <center>
        <main>
            <?php echo $passwordExit; ?>
            <h2>Register</h2>
            <form action="#" method="POST" name="register">
                <label for="email_address">E-Mail Address</label><br>
                <input type="text" id="email_address" name="email" value="<?php echo $_POST['email'] ?>" autofocus><br>
                <?php echo  "<p class='error'>$emailErr</p>"; ?>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" value="<?php echo $_POST['password'] ?>"><br>
                <?php echo  "<p class='error'>$passwordErr</p>"; ?>
                <input type="submit" value="Register" name="register">
            </form>
        </main>
    </center>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
