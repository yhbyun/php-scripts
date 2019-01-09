<?php

require 'vendor/autoload.php';

$objPHPExcel = PHPExcel_IOFactory::load('SampleData.xlsx');

// select SalesOrder sheet
$data = $objPHPExcel->setActiveSheetIndexByName('SalesOrders')->toArray(null, true, true, true);
$rows = count($data);

define('TOTAL', 'G');

for ($line = 2; $line <= $rows; $line++) {
    $row = $data[$line];
    $total = trim($row[TOTAL]);

    echo "Total: $total\n";
}
