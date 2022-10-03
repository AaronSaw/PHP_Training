<link rel="stylesheet" href="css/style.css">
<?php
echo "<pre>";
echo "<center>";
$temFile = $_FILES['upload']['tmp_name'];
$temName = $_FILES['upload']['name'];
$image = $_FILES['upload']['type'];
$folderName = $_POST['folderName'];
function run($temFile, $temName, $image, $folderName)
{
    foreach ($temFile as $key => $tf) {
        if ($_FILES['upload']['size'][$key] == 0) {
            $error = 'Please choose something!';
            header("location:index.php?error=$error");
        } else
if (!($image[$key] == 'image/jpeg' || $image[$key] == 'image/jpg' || $image[$key] == 'image/png')) {
            $error = 'Please choose only image!';
            header("location:index.php?error=$error");
        } else
if (empty($_POST['folderName'])) {
            $folderErr = 'Please  fill folder !';
            $fileName = $_FILES['upload'][''];
            header("location:index.php?folderErr=$folderErr&selectedImg=$fileName");
        } else {

            $folder = mkdir($folderName);
            $storeFolder = $folderName . '/';
            move_uploaded_file($temFile[$key], $storeFolder . uniqid() . "_" . $temName[$key]);
        }
    }
}
run($temFile, $temName, $image, $folderName);
$store = scandir($folderName);
?>
<div class="gallery-bar">
    <h1><?php echo $folderName; ?> Folder</h1>
    <a href="index.php?folder=<?php echo $folderName; ?>"> add image</a>
</div>
<br>
<table cellspacing="0px" cellpadding="0px">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
    </thead>
    <?php
    $i = 1;
    foreach ($store as $key => $value) {
        if ($key > 1) {
    ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $folderName . '/' . $value ?></td>
                <td>
                    <img src="<?php echo $folderName . '/' . $value; ?>" alt="">
                </td>
            </tr>
    <?php
            $i++;
        }
    }
    ?>
</table>
</center>
