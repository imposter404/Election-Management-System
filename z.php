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
// session_start();



// $document = $collection->findOne(['_id'=>$_SESSION["ID"]]);
// if($document)
// {
//     echo "hi";
//     $z->log=$document->log;
//     print_r($z);
// }    $collection = $database->selectCollection('status');

$voting=new obj();

$collection = $database->selectCollection('status');
if($document)
{
    $voting->Start_Date=$document->Start_Date;
    $voting->End_Date=$document->End_Date;
    $voting->Start_Time=$document->Start_Time;
    $voting->End_Time=$document->End_Time;
    $voting->Status=$document->Status;
}

print_r($document->_id);
print_r($voting);




// echo 'valid';





?>