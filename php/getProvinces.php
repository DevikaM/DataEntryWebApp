<?php 
require 'DB.php';

//$DB = mysqli_connect($sv, $un, $pw, $db) or die ("DB failed: " . mysqli_error());
header('Content-Type: application/json');
$results = getProvinces($DB);
print_r(json_encode($results));

//mysqli_close($DB);


function getProvinces($con){

    $SQL = "select * from provinces";
    $ret = mysqli_query($con, $SQL) or die ("DB failed: " . mysqli_error());
    $rows = array(); 
    $results = array();
    while($r = mysqli_fetch_assoc($ret)) {
        $rows[] = json_encode($r);  
    }
    return $rows;
}

?>