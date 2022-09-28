<h2>Diamond</h2>
<?php
echo "<pre>";
for ($i = 1; $i <= 6; $i++) {
    for ($s = $i; $s <= 8; $s++) {
        echo "&nbsp;";
    }
    for ($j = 2 * $i - 1; $j > 0; $j--) {
        echo ("*");
    }

    echo "<br>";
}
$n = 9;
for ($i = 5; $i > 0; $i--) {
    for ($j = $n - $i; $j > 0; $j--) {
        echo "&nbsp";
    }

    for ($j = 2 * $i - 2; $j > 0; $j--) {
        echo ("*");
    }
    echo ("*");
    echo "<br>";
}
?>