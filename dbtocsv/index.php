<?php
 
include_once 'dbconnect.php';
include_once 'dbtocsv.php';


$csv = new CSV();

$sql = "SELECT products_book_id, book_name, publisher_name, isbn_13, products_book.image
FROM products_book
LEFT JOIN publisher_master ON publisher_master.publisher_master_id = products_book.publisher_master_id
WHERE products_book.image = ''
OR products_book.image NOT LIKE '%.jpg'";
$csv->exportMysqlToCsv($sql);
?>