<?php
if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');
$collection = $database->selectCollection('user');


$q=$_REQUEST['q'];
$r=json_decode($q);

// print_r($r);

// $document = $collection->findOne(['user_id'=>"ABC"]);
// $document = $collection->findOne(['_id'=>'67c6a00eca2ce367426ecdcf']);

session_start();
// echo $_SESSION["ID"];

// echo $r->data->register_First_Name;



$filter = ['_id' => new MongoDB\BSON\ObjectId($_SESSION["ID"])];
// $update = ['$set' => ['l'=>['k'=>'11'],'p'=>'00']]; // Replace with the field you want to update and the new value
$update = ['$set' => [
                    // 'name'=>['first_Name'=>'1','last_Name'=>'1'],
                    // 'date_of_birth'=>'1',
                    // 'gender'=>'1',
                    // 'phone_no'=>'1',
                    // 'email'=>'1',
                    // 'address'=>['pin_code'=>'1','state'=>'1','Address'=>'1'],

                    'name'=>['first_Name'=>$r->data->register_First_Name,'last_Name'=>$r->data->register_Last_Name],
                    'date_of_birth'=>$r->data->register_dob,
                    'gender'=>$r->data->register_gender,
                    'phone_no'=>$r->data->register_Phone,
                    'email'=>$r->data->register_Email,
                    'address'=>['pin_code'=>$r->data->register_Pin_Code,'state'=>$r->data->register_State,'Address'=>$r->data->register_Address_1],
                    'Vo_Id'=>"V".date("Ymd").rand(0,1000)
                    // 'user'=>['user_id'=>'1','user_id_hash'=>'1','password'=>'1','password_hash'=>'1',],
                    ]
                ]; 

$result = $collection->updateOne($filter, $update);
print_r($result);
echo "Modified " . $result->getModifiedCount() . " document(s)\n";


?>