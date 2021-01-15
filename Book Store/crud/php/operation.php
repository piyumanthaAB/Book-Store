<?php

require_once("db.php");
require_once("component.php");

$con=createDb();

if(isset($_POST['create'])){
    createData();
    
    
}
if(isset($_POST['read'])){
    getData();
}


if(isset($_POST['update'])){
    updateData();
}

if(isset($_POST['delete'])){
    deleteData();
}

if(isset($_POST['delete-all'])){
    deleteAll();
}

function  createData(){
    $id = val($_POST['book_id']);
    $name = val($_POST['book_name']);
    $publisher = val($_POST['book_publisher']);
    $price =val( $_POST['book_price']);

    if($name && $publisher && $price){
        $stmt = $GLOBALS['con']->prepare("INSERT INTO books(book_name,book_publisher,book_price) VALUES(?,?,?)");
        $stmt->bind_param("ssd",$name,$publisher,$price);

        if($stmt->execute()){
            textNode("Records Created!","success");
        }else{
            textNode(' error',"fail");
            echo $con->error;
        }
        $stmt->close();
    }else{
        textNode(' Insert data to text boxes',"fail");
    }

    

    
}

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//messages

function textNode($msg,$id){
   $element = "<h5 id='$id'> $msg</h5> ";

   echo $element;
}


//get data from database;

function getData(){
    $sql = "SELECT * FROM books";
    $result = $GLOBALS['con']->query($sql);

    return $result;

    
}

//update data
function updateData(){
    $id= val($_POST['book_id']);
    $name= val($_POST['book_name']);
    $publisher= val($_POST['book_publisher']);
    $price= val($_POST['book_price']);

    //echo "id: ".$id." name: ".$name." publisher: ".$publisher." price: ".$price." ";

    if($name && $publisher && $price){
        $sql= "UPDATE books SET book_name='$name',book_publisher='$publisher',book_price='$price' WHERE id='$id'";
        if($GLOBALS['con']->query($sql)){
            textNode("Record Updated!","success");
        }else{
            echo "error";
        }

    }else{
        textNode(' Insert data to text boxes',"fail");
    }
    
}

//delete data
function deleteData(){
    $id= val($_POST['book_id']);

    if($id){
        $sql = "DELETE FROM books WHERE id='$id'";
        if($GLOBALS['con']->query($sql)){
            textNode("Record Deleted!","success");
        }else{
            echo "error";
        }
    }else{
        echo "No valid id is enterd!";
    }
    
}

function deleteAllBtn(){
    $result =getData();

    if($result){
        if($result->num_rows>3){
            buttonComponent("deleteAll","delete-all","btn-danger","<i class='far fa-trash-alt fa-lg'></i> Delete All","");
            return;
        }
    }
}

//delete all the data
function deleteAll(){
    $sql ="DELETE FROM books";
    
    if($GLOBALS['con']->query($sql)){
        textNode("All the records Deleted!","success");
    }
}

//setId

function setID(){
    $getID= getData();
    $id=0;
    if($getID){
        while($row=$getID->fetch_assoc()){
            $id= $row['id'];
        }
    }
    return ($id+1);
}

?>