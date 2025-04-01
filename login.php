<?php

if (!extension_loaded('mongodb')) {
    die('MongoDB extension is not loaded');
}

require(__DIR__."/phpmongodb/vendor/autoload.php");

$client = new MongoDB\Client("mongodb://localhost:27017"); // Replace with your connection string

$database = $client->selectDatabase('Project');
$collection = $database->selectCollection('user');


session_start();

$q=$_REQUEST['q'];
$r=json_decode($q);
// $fn=$r->user_id;
// $_SESSION["Token"]="12";

class obj{} //object define
$a=new obj();
$b=new obj();

if($r->SessionToken !="")
{
    if($r->SessionToken==$_SESSION["Token"])
    {
        $b->SessionToken="valid";
        $document = $collection->findOne(['_id' => $_SESSION["ID"]]);
        profile($document);
        $b->profile=$a;
        // print_r(json_encode($document));
    }
    else{
        $b->SessionToken="valid";
    }
    print_r(json_encode($b));
}
else{
    // echo "no";
    z();
}
// echo $r;
// print_r(json_encode($q));
// print_r($r->SessionToken);



function profile($e){
    global $collection;
    global $a;
    global $document;

    $document=$e;
    $a->profile=new obj();
    $a->profile->name=$document->name->first_Name;
    $a->profile->name=$document->name->last_Name;
    $a->profile->dob=$document->date_of_birth;
    $a->profile->gender=$document->gender;
    $a->profile->phone_no=$document->phone_no;
    $a->profile->email=$document->email;
    $a->profile->pin_code=$document->address->pin_code;
    $a->profile->state=$document->address->state;
    $a->profile->Address=$document->address->Address;
    $a->profile->Vo_Id=$document->Vo_Id;
    $a->profile->user_id=$document->user->user_id;
}





function z(){
global $r;
global $collection;
global $a;

$user_hash=hash('sha256',$r->user_id);
$password_hash=hash('sha256',$r->password);

// print_r($user_hash.'\n'.$password_hash);
// print_r($'\n');

// class obj{} //object define

// $document = $collection->findOne(['user_id_hash'=>$user_hash]);
$document = $collection->findOne(['user.user_id_hash' => $user_hash]);
// $filter = ['_id' => new MongoDB\BSON\ObjectId($document->_id)];
if($document)
{
    $a->user_id='true';
    $document = $collection->findOne(['user.password_hash'=>$password_hash]);
    if($document)
    {
        $a->password='true';
        $a->SessionToken=session_create_id();
        $_SESSION["Token"]=$a->SessionToken;
        $_SESSION["ID"]=$document->_id;
        if(isset($document->name))
        {
            profile($document);
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

}





?>