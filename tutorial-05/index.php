<?php
echo "<h1>Reading Txt</h1>";
$myfile = fopen("File/text.txt", "r");
while (!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile); ?>

<!--xlsx file -->
<h1>Reading Xlsx</h1>
<table border="1" cellspacing="0px" cellpadding="0px">
    <?php
    // (A) PHPSPREADSHEET TO LOAD EXCEL FILE
    require "vendor/autoload.php";

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load("File/test.xlsx");
    $worksheet = $spreadsheet->getActiveSheet();

    // (B) LOOP THROUGH ROWS OF CURRENT WORKSHEET
    foreach ($worksheet->getRowIterator() as $row) {
        // (B1) READ CELLS
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        // (B2) OUTPUT HTML
        echo "<tr'>";
        foreach ($cellIterator as $cell) {
            echo "<td>" . $cell->getValue() . "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<h1>Reading Csv</h1>
<table border="1" cellspacing="0px" cellpadding="0px">
    <?php
    // (A) PHPSPREADSHEET TO LOAD EXCEL FILE
    require "vendor/autoload.php";

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    $spreadsheet = $reader->load("File/csv_sample.csv");
    $worksheet = $spreadsheet->getActiveSheet();

    // (B) LOOP THROUGH ROWS OF CURRENT WORKSHEET
    foreach ($worksheet->getRowIterator() as $row) {
        // (B1) READ CELLS
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        // (B2) OUTPUT HTML
        echo "<tr'>";
        foreach ($cellIterator as $cell) {
            echo "<td>" . $cell->getValue() . "</td>";
        }
        echo "</tr>";
    }
    ?></table>

<h1>Reading Doc</h1>
<?php
require "vendor/autoload.php";

//Reading From Document File
$phpWord = \PhpOffice\PhpWord\IOFactory::load("File/saw.docx");
echo "<br><br><h2>Reading from Document File!</h2>";
$sections = $phpWord->getSections();
foreach ($sections as $key => $value) {
    $sectionElement = $value->getElements();
    foreach ($sectionElement as $elementKey => $elementValue) {
        if ($elementValue instanceof \PhpOffice\PhpWord\Element\TextRun) {
            $secondSectionElement = $elementValue->getElements();
            foreach ($secondSectionElement as $secondSectionElementKey => $secondSectionElementValue) {
                if ($secondSectionElementValue instanceof \PhpOffice\PhpWord\Element\Text) {
                    echo $secondSectionElementValue->getText();
                }
            }
        }
    }
}
