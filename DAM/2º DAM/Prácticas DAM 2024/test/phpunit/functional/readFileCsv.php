<?php
require("../../../file/FileCsv.class.php");

$file = new FileCsv("file901.csv");

if (!$file->isError()) {
    echo "<pre>";
    var_dump($file->getData());
    echo "</pre>";

} else {
    echo "err";
}
