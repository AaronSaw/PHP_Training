<link rel="stylesheet" href="css/style.css">
<?php
require "function/function.php";
$id = $_GET['id'];
$current = student($id);
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $name = trim($name);
    $rom = $_POST['room'];
    $room = trim($rom);
    $addr = $_POST['address'];
    $address = trim($addr);
    if (empty($_POST['name']) || strlen($name) == 0) {
        $nameErr = "Please fill your name !";
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
        $nameErr = "Only letters and white space allowed";
    }
    if (empty($_POST['age'])) {
        $ageErr = "Please fill your age !";
    }
    if (empty($_POST['gender'])) {
        $genderErr = "Please choose gender !";
    }
    if (empty($_POST['room']) || strlen($room) == 0) {
        $roomErr = "Please fill your room !";
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['room'])) {
        $roomErr = "Only letters and white space allowed";
    }
    if (empty($_POST['address']) || strlen($address) == 0) {
        $addressErr = "Please fill your address !";
    }
    if ((!empty($_POST['name'])) && (!empty($_POST['age'])) && (!empty($_POST['gender'])) && (!empty($_POST['room']))  && (!empty($_POST['address']))
        && (!strlen($name) == 0)  && (!strlen($room) == 0) && (!strlen($address) == 0)
        && preg_match("/^[a-zA-Z-' ]*$/", $_POST['name']) && preg_match("/^[a-zA-Z-' ]*$/", $_POST['room'])
    ) {
        if (studentUpdate()) {
            linkTo('student_list.php');
        }
    }
}
?>

<center>
    <form action="" method="post">
        <input type="hidden" class="" value="<?php echo   $id; ?>" name="id">
        <h1>Student's Edit</h1>
        <label for="">Name</label><br>
        <input type="text" name="name" value="<?php echo $current['name']; ?> "><br>
        <?php echo "<p class='error'>$nameErr</p>" ?>
        <label for="">Age</label><br>
        <input type="number" name="age" value="<?php echo $current['age']; ?>"><br>
        <?php echo "<p class='error'>$ageErr</p>" ?>
        <label for="">Gender</label><br>
        <div class="d-flex">
            <div class="d-flex">
                <input type="radio" name="gender" value="female" <?php echo $current['gender'] == 'female' ? 'checked' : ''; ?>><span> female</span>
            </div>
            <div class="d-flex">
                <input type="radio" name="gender" value="male" <?php echo $current['gender'] == 'male' ? 'checked' : ''; ?>><span>male</span><br>
            </div>
        </div>
        <?php echo "<p class='error'>$genderErr</p>" ?>
        <label for="">Room</label><br>
        <input type="text" name="room" value="<?php echo $current['room']; ?>"><br>
        <?php echo "<p class='error'>$roomErr</p>" ?>
        <label for="">Address</label> <br>
        <textarea name="address" id="" cols="37" rows="10"><?php echo $current['address']; ?></textarea><br>
        <?php echo "<p class='error'>$addressErr</p>" ?>
        <button name="update">update</button>
    </form>
</center>
