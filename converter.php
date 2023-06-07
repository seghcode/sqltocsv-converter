
<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

function convertToFormat($data, $formats, $table)
{
    foreach ($formats as $format) {
        switch ($format) {
            case 'csv':
                convertToCSV($data, $table);
                break;
            case 'xlsx':
                convertToExcel($data, $table);
                break;
            default:
                die("Invalid format specified.");
        }
    }
}

function convertToCSV($data, $table)
{
    $filename = "converted_files/$table.csv";
    $file = fopen($filename, 'w');

    // Write the headers
    $headers = array_keys($data[0]);
    fputcsv($file, $headers);

    // Write the data rows
    foreach ($data as $row) {
        fputcsv($file, array_values($row));
    }

    fclose($file);
}

function convertToExcel($data, $table)
{
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the headers
    $headers = array_keys($data[0]);
    $sheet->fromArray($headers, null, 'A1');

    // Set the data
    $rowData = [];
    foreach ($data as $row) {
        $rowData[] = array_values($row);
    }
    $sheet->fromArray($rowData, null, 'A2');

    // Save the Excel file
    $filename = "converted_files/$table.xlsx";
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save($filename);
}

// <?php

// require_once 'vendor/autoload.php';


// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;

// function convertToFormat($data, $format, $table)
// {
//     $spreadsheet = new Spreadsheet();
//     $sheet = $spreadsheet->getActiveSheet();

//     // Set the headers
//     $headers = array_keys($data[0]);
//     $sheet->fromArray($headers, null, 'A1');

//     // Set the data
//     $rowData = [];
//     foreach ($data as $row) {
//         $rowData[] = array_values($row);
//     }
//     $sheet->fromArray($rowData, null, 'A2');

//     // Save the file in the specified format
//     $filename = "converted_files/$table.$format";

//     switch ($format) {
//         case 'csv':
//             $writer = IOFactory::createWriter($spreadsheet, 'Csv');
//             $writer->setDelimiter(','); 
//             break;
//         case 'ods':
//             $writer = IOFactory::createWriter($spreadsheet, 'Ods');
//             break;
//         default:
//             die("Invalid format specified.");
//     }

//     $writer->save($filename);
// }
