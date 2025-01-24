<?php

try {
     
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $bulk = new MongoDB\Driver\BulkWrite;
    
    $name = $_POST['name'];
    $ign = $_POST['ign'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    $doc = ['_id' => new MongoDB\BSON\ObjectID, 'name' => $name, 'ign' => $ign, 'email' => $email, 'mobile' => $mobile, 'message' => $message ];
    $bulk->insert($doc);
    
    $mng->executeBulkWrite('chavindu.registers', $bulk);


    header("location: contact.html");
        
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";    
}

?>