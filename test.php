<?php

if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');;
$collection = $database->selectCollection('user');


// $collection->update(array("password"=>"123"),array('$set'=>array("password"=>"555")));

// $filter = ['_id' => new MongoDB\BSON\ObjectId('67c6a00eca2ce367426ecdcf')]; // Replace with the document ID you want to update
$filter = ['_id' => new MongoDB\BSON\ObjectId('67c6a00eca2ce367426ecdcf')]; // Replace with the document ID you want to update
$update = ['$set' => ['password' => '555']]; // Replace with the field you want to update and the new value

$result = $collection->updateOne($filter, $update);

echo "Matched " . $result->getMatchedCount() . " document(s)\n";
echo "Modified " . $result->getModifiedCount() . " document(s)\n";

?>