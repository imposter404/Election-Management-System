<?php
// // Ensure the MongoDB extension is loaded
// if (!extension_loaded('mongodb')) {
//     die('MongoDB extension is not loaded');
// }

// require(__DIR__."/phpmongodb/vendor/autoload.php");

// $client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

// $database = $client->selectDatabase('Project');
// $collection = $database->selectCollection('user');



// $q=$_REQUEST['q'];
// $r=json_decode($q);

// // $document = $collection->findOne(['user_id'=>$r->user_id]);
// // if(empty($document))
// // {
//     // $insertResult = $collection->insertOne([
//     //     'user'=>[
//     //         'user_id'=>$r->user_id,
//     //         'password'=>$r->password,
//     //         'user_id_hash'=>hash('sha256',$r->user_id),
//     //         'password_hash'=>hash('sha256',$r->password)
//     //     ],
//     // ]);
// // }
// // else{
//     // echo 'invalid';
// // }

class obj{} //object define
$a=new obj();

$a->g=101;
echo json_encode($a);
?>