<?php

if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');;
$collection = $database->selectCollection('user');



$q=$_REQUEST['q'];
$r=json_decode($q);
// $fn=$r->do;
$fn=$r->user_id;

$user_hash=hash('sha256',$r->user_id);
$password_hash=hash('sha256',$r->password);

// print_r($user_hash.'\n'.$password_hash);
// print_r($'\n');

class obj{} //object define
$a=new obj();

$g=125;

$document = $collection->findOne(['user_hash'=>$user_hash]);
$filter = ['_id' => new MongoDB\BSON\ObjectId($document->_id)];
if($document)
{
    $a->user_id='true';
    $document = $collection->findOne(['password_hash'=>$password_hash]);
    if($document)
    {
        $a->password='true';
        if($document->SessionToken == "")
        {
            $a->SessionToken=session_create_id();
            session_start();
            $_SESSION["Token"]=$a->SessionToken;
            // $update = ['$set' => ['SessionToken' =>$a->SessionToken]];
            // $result = $collection->updateOne($filter, $update);
        }
    }
    else{
        $a->password='false';
    }
}
else{
    $a->user_id='false';
}

print_r(json_encode($a));
?>