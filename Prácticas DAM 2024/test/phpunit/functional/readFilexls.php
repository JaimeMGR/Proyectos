<?php

require("../../../file/FileExcel.class.php");

$file = new FileExcel(".xlsx");

if (!$file->isError()) {
    echo "<pre>";
    var_dump($file->getData());
    echo "</pre>";
} else {
    echo "err";
}
