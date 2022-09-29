<?php
session_start();
if (!$_SESSION['userInfo']) {
    header("location:login.php");
} else { ?>
    <div class="result-card">
        <h3>Your Name is : <span><?php echo $_SESSION['userInfo']['name']; ?></span></h3>
        <h3>Your password is : <span><?php echo $_SESSION['userInfo']['password']; ?></span></h3>
        <form action="logout.php" method="POST">
            <button name="logout">logout</button>
        </form>
    </div>
<?php
} ?>
