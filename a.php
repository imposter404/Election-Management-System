<?php
// Ensure the MongoDB extension is loaded
if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}
// require "..vendor/autoload.php";
require(__DIR__."/phpmongodb/vendor/autoload.php");
// Create a MongoDB client
$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string
echo "12";
// // Select a database
$database = $client->selectDatabase('Project');

// Select a collection
// $collection = $database->selectCollection('Employee');
$collection = $database->selectCollection('vote');

// // Example: Insert a document
// $insertResult = $collection->insertOne([
//     'name' => 'John Doe',
//     'email' => 'john@example.com',
//     "zz"=>[1,2,3,4],
// ]);

// echo "Inserted document with ID: " . $insertResult->getInsertedId() . "\n";

// // Example: Find a document
// $document = $collection->findOne(['name' => 'John Doe']);
$document = $collection->find();
// $document = $collection->find(['type' => 'core']);

foreach($document as $r){

    print_r($r["zz"]);
    // print_r($document->zz);
}
// print_r($document);
?>




