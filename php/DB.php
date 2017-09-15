<?php 

/*$sv= "jmirtest.cpa5j8xogixh.us-east-2.rds.amazonaws.com";
$un= "dev14";
$pw= "Maharaj14#";
$db= "JMIR";*/
$sv= "localhost";
$un= "id2920980_dev14";
$pw= "Maharaj14#";
$db= "id2920980_jmir";

$DB = mysqli_connect($sv, $un, $pw, $db) or die ("DB failed: " . mysqli_error());
?>