<link rel="stylesheet" href="css/style.css">
<?php
//delte QR image
$delName = $_GET['delName'];
unlink(realpath($delName));

//update QR image
if (isset($_POST['update'])) {
    $text = $_POST['qrcode'];
    $file = 'img/' . $text . '.png';
    if (empty($text)) {
        $error = "Please enter QR-value !";
    } else  if (file_exists($file)) {
        $error = "QR value is exit!";
    } else {
        require "phpqrcode/qrlib.php";
        $floder = "img/";
        $filename = $floder . $text . '.png';
        QRcode::png($text, $filename, 5, 5);
        header("location:result.php?text=$text");
    }
}
?>

<center>
    <form action="" method="post">
        <h1>QR Edit</h1>
        <input type="text" name="qrcode" placeholder="Enter QR value" value="<?php echo $_GET['text']; ?>">
        <?php echo "<p class=error>$error</p>"; ?>
        <button name="update">update</button>
    </form>
</center>
