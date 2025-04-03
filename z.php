<?php
if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');
$collection = $database->selectCollection('user');


// $a=[1,2,3];
// array_push($a,4);
// $q=$_REQUEST['q'];
// $r=json_decode($q);
class obj{}
// $z=new obj();
// $b=new obj();
// $b->tim="1/20";
// $b->log="200";

// array_push($a,$b);

// print_r($a);


// $insertResult = $collection->insertOne([
//     'log'=>$a
// ]);
session_start();



// $document = $collection->findOne(['_id'=>$_SESSION["ID"]]);
$document = $collection->findOne(['_id'=>new MongoDB\BSON\ObjectId($_SESSION["ID"])]);
// if($document)
// {
//     echo "hi";
//     $z->log=$document->log;
//     print_r($z);
// }    $collection = $database->selectCollection('status');

// $voting=new obj();

// $collection = $database->selectCollection('status');
// if($document)
// {
//     $voting->Start_Date=$document->Start_Date;
//     $voting->End_Date=$document->End_Date;
//     $voting->Start_Time=$document->Start_Time;
//     $voting->End_Time=$document->End_Time;
//     $voting->Status=$document->Status;
// }

// unset($document->user);
// unset($document->_id);
// $document=json_encode($document);
// print_r($document);
// print_r($voting);

// $month=["JAN","FEB","MAR","APR","MAY","JUN","JULY","AUG","SEP","OCT","NOV","DEC"];

// echo $month[intval(date("m"))-1];

// echo date("d").'/'.$month[intval(date("m"))-1].'/'.date("Y");
// echo 'valid';





?>