<?php session_start();
include('connect/connection.php');
if (!isset($_SESSION['token'])) {
    header("location:index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login Form</title>
</head>

<body>

    <?php
    if (isset($_POST["reset"])) {
        include('connect/connection.php');
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        $hash = password_hash($psw, PASSWORD_DEFAULT);

        $sql = mysqli_query($connect, "SELECT * FROM login WHERE email='$Email'");
        $query = mysqli_num_rows($sql);
        $fetch = mysqli_fetch_assoc($sql);
        if (empty($psw)) {
            $passwordErr = "Please fill new password!";
        } else if ($Email) {
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE login SET password='$new_pass' WHERE email='$Email'");
    ?>
            <script>
                window.location.replace("index.php");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'your password has been succesful reset',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password donot exit!',
                })
            </script>
    <?php
        }
    }
    ?>

    <center>
        <h1><a class="navbar-brand" href="#">Password Reset Form</a></h1>
        <main class="login-form">
            <h1>Reset Your Password</h1>
            <form action="#" method="POST" name="login">
                <label for="password">New Password</label><br>
                <input type="password" id="password" name="password" value="<?php echo $_POST['password']; ?>" autofocus><br>
                <?php echo "<p class='error'>$passwordErr</p>"; ?>
                <input type="submit" value="Reset" name="reset">
                </div>
            </form>
        </main>
    </center>
</body>

</html>
