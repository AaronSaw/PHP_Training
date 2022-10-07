<?php session_start();
if (!isset($_SESSION['otp'])) {
    header("location:register.php");
} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Verification</title>
</head>

<body>
    <?php
    include('connect/connection.php');
    if (isset($_POST["verify"])) {
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];
        if (empty($otp)) {
            $otpErr = "Please fill OTP ?";
        } else {
            if ($otp != $otp_code) {
    ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Invail OTP',
                    })
                </script>
            <?php
            } else {
                session_destroy();
                mysqli_query($connect, "UPDATE login SET status = 1 WHERE email = '$email'");
            ?>
                <script>
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Verfiy account done, you may sign in now',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    setTimeout(() => {
                        window.location.replace("index.php");
                    }, 1600);
                </script>
    <?php
            }
        }
    }
    ?>
    <center>
        <h1><a class="navbar-brand" href="#">Verification Account</a></h1>
        <main>
            <h1>Verification Account</h1>
            <form action="#" method="POST">
                <label for="email_address">OTP Code</label>
                <input type="text" id="otp" name="otp_code" autofocus value="<?php echo $_POST['otp_code']; ?>">
                <?php echo "<p class='error'>$otpErr</p>"; ?>
                <input type="submit" value="Verify" name="verify">
            </form>
        </main>
    </center>

</body>

</html>
