<?php 
require 'DB.php';

$DB = mysqli_connect($sv, $un, $pw, $db) or die ("DB failed: " . mysqli_error());
header('Content-Type: application/json');
addUser($DB);


//mysqli_close($DB);

function addUser($DB){
    //var_dump($_POST);
     $postdata = file_get_contents("php://input");
     $request = json_decode(stripslashes($postdata));
     //echo json_last_error();
    // var_dump($postdata);
    // var_dump($request);

     if($request->provinceIndex ==  2)
     {
        $salary =  str_replace(',', '.' , $request->salary ).trim();

     }else {
        $salary = str_replace(',', '' , $request->salary ).trim();
        echo "SALARY: ".  (double)$salary;
     }

    //$SQL = "INSERT INTO users(name, province_id, phone , postal_code, salary) VALUES ('" . $_GET["name"]  . "'," . $_GET["provinceIndex"] . ",'" . $_GET["phone"] . "','" . $_GET["postalCode"] . "'," . $_GET["salary"] . ")"; 
    //$SQL = "INSERT INTO users(name, province_id, phone , postal_code, salary) VALUES ('" . $_POST["name"]  . "'," . $_POST["provinceIndex"] . ",'" . $_POST["phone"] . "','" . $_POST["postalCode"] . "'," . $_POST["salary"] . ")"; 
    $SQL = "INSERT INTO users(name, province_id, phone , postal_code, salary) VALUES ('" . $request->name  . "'," . $request->provinceIndex . ",'" . $request->phone . "','" . $request->postalCode . "'," . (double)$salary/*.str_replace(",",".").trim()*/ . ")"; 
    echo $SQL;
    $ret = mysqli_query($DB, $SQL) or die ("DB failed: " . mysqli_error());
}

?>