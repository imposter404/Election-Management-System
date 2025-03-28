<?php

if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');;
$collection = $database->selectCollection('user');


// // $collection->update(array("password"=>"123"),array('$set'=>array("password"=>"555")));

// // $filter = ['_id' => new MongoDB\BSON\ObjectId('67c6a00eca2ce367426ecdcf')]; // Replace with the document ID you want to update
// $filter = ['_id' => new MongoDB\BSON\ObjectId('67c6a00eca2ce367426ecdcf')]; // Replace with the document ID you want to update
// $update = ['$set' => ['password' => '555']]; // Replace with the field you want to update and the new value

// $result = $collection->updateOne($filter, $update);

// echo "Matched " . $result->getMatchedCount() . " document(s)\n";
// echo "Modified " . $result->getModifiedCount() . " document(s)\n";


// $q=$_REQUEST['q'];
// $r=json_decode($q);

session_start();
// echo $_SESSION["Token"];





// if($r==$_SESSION["Token"])
// {
//     echo $_SESSION["Token"];
// }
// else{
//     echo "no";
// }
// session_destroy();



// $document = $collection->findOne(['user_id'=>"ABC"]);

// if($document)
// {
// // echo  key_exists("name",$document);
// if(isset($document->passwor))
// {
//     echo "ff";
// }
// else{
//     echo "gg";
// }
// //  echo "hi";
// print_r($document);
// }
// print_r(json_encode($a));

// class obj{} //object define
// $a=new obj();
// $a->g=new obj();
// $a->g->k=10;
// $user_hash=hash('sha256','aaa');
// // $password_hash=hash('sha256',$r->password);


// $document = $collection->findOne(['user.user_id' => 'aaa']);

$document = $collection->findOne(['_id' => $_SESSION["ID"]]);

print_r(json_encode($document));
// print_r(json_encode($a));






?>