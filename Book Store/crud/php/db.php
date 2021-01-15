<?php

function createDb(){
    $servername= "localhost";
    $username= "root";
    $password= "admin";
    $dbname= "bookstore";
    
    //create connection
    $con = new mysqli($servername,$username,$password);
    
    //check connection
    if($con->connect_error){
        die( "Connection failed.." .$con->connect_error) ;
    }
    
    //create database
    
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    
    if($con->query($sql)){
        // echo "Database created successfully! ";
        $con = new mysqli($servername,$username,$password,$dbname);
        $sql = "CREATE TABLE IF NOT EXISTS books(
                id INT (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                book_name VARCHAR(25) NOT NULL,
                book_publisher VARCHAR (20),
                book_price FLOAT
        )";
        if($con->query($sql)){
            return $con;
        }else{
            echo "Error in table creation! ".$con->error;
        }

    }else{
        echo "Error creating database !".$con->error;
    }
}



?>