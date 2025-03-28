



// class obj{} //object define
// $a=new obj();

// $a->g=10;
// $a->h=20;

// $name=new obj();
// $name->first_Name='John';
// $name->last_Name ='Doe';

// $user=new obj();
// $user->user_id="a123";
// $user->user_id_hash="001";
// $user->password='a123';
// $user->password_hash='200';



// Example: Insert a document
// $insertResult = $collection->insertOne([
//     'voter_id'=>'ABCD1234',
//     'name'=>$name,
//     'email' => 'john@example.com',
//     'phone_no' => '123456789',
//     'gender' => 'Male',
//     'date_of_birth' => '21/5/2000',
//     'user'=>$user,
//     'SessionToken'=>''
// ]);

// echo "Inserted document with ID: " . $insertResult->getInsertedId() . "\n";

// $ao=session_create_id();

// echo $ao



// $document = $collection->findOne(['voter_id'=>"ABCD123"]);


// $voter_id="V".date("Ymd").rand(0,1000);
// print_r($voter_id);


// $document = $collection->findOne(['user.user_id_hash'=>"001",'user.password_hash'=>"200"]);
// // $document = $collection->find([' type' => 'core']);

// if($document)
// {
//     echo "found";
// }
// else{
//     echo "  nooot found";
// }




// foreach($document as $r){
//     print_r($r["name"]);
// }
// echo $document->name->g;

// print_r($document->name);
// print_r($document->email);

