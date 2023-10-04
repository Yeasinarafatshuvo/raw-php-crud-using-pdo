<?php 

$server_name = "localhost";
$user_name =  "root";
$password = "";
$database = "crud_pdo";


try{
    $conn = new PDO("mysql:
                            host=$server_name;
                            dbname=$database;",
                            $user_name,
                            $password
                    );
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "connection failed" .$e->getMessage();
}


?>