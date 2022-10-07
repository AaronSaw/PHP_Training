<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login Form</title>
</head>

<?php session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<body>

    <?php
    if (isset($_POST["recover"])) {
        include('connect/connection.php');
        $email = $_POST["email"];

        $sql = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");
        $query = mysqli_num_rows($sql);
        $fetch = mysqli_fetch_assoc($sql);
        if (empty($email)) {
            $emailErr = "Please fill eamil!";
        } else if (mysqli_num_rows($sql) <= 0) {
    ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'alert...',
                    text: 'Your Email does not exit!',

                })
            </script>
        <?php
        } else if ($fetch["status"] == 0) {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'warning...',
                    text: 'sorry, your account must verify first, before you recover your password !',
                })
                setTimeout(() => {
                    window.location.replace("index.php");
                }, 3000);
            </script>
            <?php
        } else {

            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require 'vendor/autoload.php';

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
            $mail->setFrom('sawkyaw7777777@gmail.com', 'Password Reset');
            $mail->addAddress($_POST["email"]);
            $mail->isHTML(true);
            $mail->Subject = "Recover your password";
            $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            $url/BIB_php/PHP_Training/Tutorial-10/reset_psw.php";
            if (!$mail->send()) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'warning...',
                        text: 'Fail sending email !',
                    })
                </script>
            <?php
            } else {
            ?>
                <script>
                    window.location.replace("notification.php");
                </script>
    <?php
            }
        }
    }

    ?>
    <center>
        <a class="navbar-brand" href="#">User Password Recover</a>
        <main class="login-form">
            <h1 class="card-header">Password Recover</h1>
            <form action="#" method="POST" name="recover_psw">
                <label for="email_address">E-Mail Address</label>
                <input type="text" id="email_address" name="email" value="<?php echo $_POST['email'] ?>" autofocus><br>
                <?php echo "<p classs='error'>$emailErr</p>"; ?>
                <input type="submit" value="Recover" name="recover">
            </form>
        </main>
    </center>
</body>

</html>
