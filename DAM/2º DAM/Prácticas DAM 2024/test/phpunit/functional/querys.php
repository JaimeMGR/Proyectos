<?php

$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER["CONTEXT_DOCUMENT_ROOT"])) {
    $res = @include $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/main.inc.php";
}
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME'];
$tmp2 = realpath(__FILE__);
$i = strlen($tmp) - 1;
$j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) {
    $i--;
    $j--;
}
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1)) . "/main.inc.php")) {
    $res = @include substr($tmp, 0, ($i + 1)) . "/main.inc.php";
}
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1))) . "/main.inc.php")) {
    $res = @include dirname(substr($tmp, 0, ($i + 1))) . "/main.inc.php";
}
// Try main.inc.php using relative path
if (!$res && file_exists("../main.inc.php")) {
    $res = @include "../main.inc.php";
}
if (!$res && file_exists("../../main.inc.php")) {
    $res = @include "../../main.inc.php";
}
if (!$res && file_exists("../../../main.inc.php")) {
    $res = @include "../../../main.inc.php";
}
if (!$res) {
    die("Include of main fails");
}

require_once "../../../db/querys.class.php";
require_once "../../../facture/CreateFacture.class.php";

$query = new Query($db);
var_dump($query->getUsers());
echo "<br>";
echo "<br>";
echo "<br>";
$res = $query->getUsers();
var_dump($query->getNumber($res[0]["rowid"]));
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($query->getDepartement(3));
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($query->createService(2));
echo "<br>";
echo "<br>";
echo "<br>";
// createfacture
$facture = new CreateFacture($db, $res[0]["rowid"], $user, 2024, 3);
var_dump($facture->getResultCreate());
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($facture->getRefFacture());
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($facture->insertService($query->createService(2)));
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($facture->insertLine("descripción", 233));
echo "<br>";
echo "<br>";
echo "<br>";
var_dump($query->getDataFreepbx(958503986, 2015, 06));
