<?php
if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');
$collection_user = $database->selectCollection('user');
$collection_vote = $database->selectCollection('vote');



$q=$_REQUEST['q'];
$r=json_decode($q);



session_start();

// echo $_SESSION["ID"];







// print_r($document->user->user_id_hash);







class obj{} //object define
$a=new obj();


$document = $collection_user->findOne(['_id' => $_SESSION["ID"]]);
$date=date("d/m/y");

if($_SESSION["Token"]==$r->SessionToken)
{

    if($r->data->vote=="true")
    {
        if($document->voted=="false")
        {
            $insertResult = $collection_vote->insertOne([
                'Vote'=>$r->data->party,
                'Date'=>$date,
                "time"=>date("h:i:sa"),
                "user_id_hash"=>$document->user->user_id_hash
    
            ]);

            $filter = ['_id' => new MongoDB\BSON\ObjectId($_SESSION["ID"])];
            $update = ['$set' => ["voted"=>"true"]];
            $result = $collection_user->updateOne($filter, $update);
            $a->response="201"; //created
            echo json_encode($a);
        }
        else {
            $a->response="405"; // User Already Voted
            echo json_encode($a);
        }
    }
}
else{
    $a->response="401"; //unauthorized
    echo json_encode($a);
}

?>