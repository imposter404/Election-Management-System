<?php

if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');;
$collection = $database->selectCollection('user');


session_start();

$q=$_REQUEST['q'];
$r=json_decode($q);
// $fn=$r->user_id;
// $_SESSION["Token"]="12";


if($r->SessionToken !="")
{
    if($r->SessionToken==$_SESSION["Token"])
    {
        echo "valid";
    }
    else{
        echo "invalid";
    }
}
else{
    // echo "no";
    z();
}
// echo $r;
// print_r(json_encode($q));
// print_r($r->SessionToken);




function z(){
global $r;
global $collection;

$user_hash=hash('sha256',$r->user_id);
$password_hash=hash('sha256',$r->password);

// print_r($user_hash.'\n'.$password_hash);
// print_r($'\n');

class obj{} //object define
$a=new obj();

$g=125;

$document = $collection->findOne(['user_hash'=>$user_hash]);
// $filter = ['_id' => new MongoDB\BSON\ObjectId($document->_id)];
if($document)
{
    $a->user_id='true';
    $document = $collection->findOne(['password_hash'=>$password_hash]);
    if($document)
    {
        $a->password='true';
        $a->SessionToken=session_create_id();
        $_SESSION["Token"]=$a->SessionToken;
    }
    else{
        $a->password='false';
    }
}
else{
    $a->user_id='false';
}
print_r(json_encode($a));
}

// z();
?>