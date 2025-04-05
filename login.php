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

class obj{} //object define
// $a=new obj();
// $b=new obj();
// $voting=new obj();

$final=new obj();
$final->login=new obj();
$final->profile=new obj();
$final->voting=new obj();
// $final->=new obj();








session_start();


if($r->SessionToken !="")
{
    if($r->SessionToken==$_SESSION["Token"])
    {
        $final->login->SessionToken="valid";
        $document = $collection->findOne(['_id' => $_SESSION["ID"]]);
        profile($document);
        voting_details();
    }
    else{
        $final->login->SessionToken="valid";
    }
    print_r(json_encode($final));
}
else{
    login();
}












function profile($e){
    global $final;
    $document=$e;

    // print_r($e);
    // echo '<p>';
    unset($document->user->user_id_hash);
    unset($document->user->password);
    unset($document->user->password_hash);
    unset($document->_id);
    $final->profile=$document;
}

function voting_details(){
    global $database;
    global $final;
    $collection = $database->selectCollection('status');

    $document = $collection->findOne(['_id'=>new MongoDB\BSON\ObjectId('67c9b12182f7ea4dfe81caeb')]);
    if($document)
    {
        $final->voting->Start_Date=$document->Start_Date;
        $final->voting->End_Date=$document->End_Date;
        $final->voting->Start_Time=$document->Start_Time;
        $final->voting->End_Time=$document->End_Time;
        $final->voting->Status=$document->Status;
    }
}

function login(){
    global $r;
    global $collection;
    global $final;

    $user_hash=hash('sha256',$r->user_id);
    $password_hash=hash('sha256',$r->password);

    $document = $collection->findOne(['user.user_id_hash' => $user_hash]);
    if($document)
    {
        $final->login->user_id='true';
        if($document->user->password_hash=$password_hash)
        {
            // print_r($document);
            // echo '<p>';
            $final->login->password='true';
            $final->login->SessionToken=session_create_id();
            $_SESSION["Token"]= $final->login->SessionToken;
            $_SESSION["ID"]=$document->_id;
            if(isset($document->name))
            {
                profile($document);
                voting_details();
            }
        }
        else{ 
            $final->login->password='false';
            unset($final->profile);
            unset($final->voting);
        }

    }
    else{
        $final->login->user_id='false';
        unset($final->profile);
        unset($final->voting);
    }
    print_r(json_encode($final));
    // $document = $collection->findOne(['user.user_id_hash' => $user_hash]);
    // print_r($document);
    // echo '<p>';
    // print_r($final);
    // echo '<p>';
    // print_r($document->_id);
    // echo '<p>';
    // echo $_SESSION["ID"];

}


?>