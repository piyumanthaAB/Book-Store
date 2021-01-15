<?php
require_once('./php/component.php');
require_once('./php/operation.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- FONTAWSOME CDN -->
    <script src="https://kit.fontawesome.com/bd44c94d16.js" crossorigin="anonymous"></script>

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" href="styles.css" class="rel">
    <!-- GOOGLE FONTS -->

    <style>
        #success {
            padding:2%;
            background-color: green;
            color:white;
        }
        #fail {
            padding:2%;
            background-color: red;
            color:white;
        }
    </style>

    

</head>
<body>
    
    <main class="">
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook" ></i> Book Store</h1>

            <div class="d-flex justify-content-center">
                <form action="" method="POST" class="w-50 ">
                    <div class="pt-2">
                    <?php inputElement("far fa-id-badge","ID","book_id",setID()); ?>
                    </div>
                    <div class="pt-2">
                        <?php inputElement("fas fa-book","Name","book_name",""); ?>
                    </div>
                    <div class="row pt-2">
                        <div class="col-lg-6"><?php inputElement("fas fa-globe-americas","Publisher","book_publisher",""); ?></div>
                        <div class="col-lg-6"><?php inputElement("fas fa-dollar-sign","Price","book_price",""); ?></div>
                    </div>
                    <div class="d-flex pt-2  justify-content-center">
                        <?php buttonComponent("btn-create","create","btn-success ml-2 mr-2 py-2 px-4","<i class='fas fa-plus fa-lg'></i>","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonComponent("btn-read","read","btn-primary ml-2 mr-2 py-2 px-4","<i class='fas fa-sync-alt fa-lg'></i>","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonComponent("btn-update","update","btn-light border ml-2 mr-2 py-2 px-4","<i class='fas fa-pen-alt fa-lg'></i>","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonComponent("btn-delete","delete","btn-danger ml-2 mr-2 py-2 px-4","<i class='far fa-trash-alt fa-lg'></i>","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteAllBtn(); ?>

                    </div>
                </form>
            </div>

            <!-- BOOTSTRAP TABLE -->
            <form action="" method="post">
            <div class="d-flex table-data mt-4 justify-content-center">
                <table class="table table-striped table-dark mx-4 w-75">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Price</th>
                        <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php 
                            $result=getData();
                            if ($result->num_rows >0){
                                while($row = $result->fetch_assoc()){?>
                                    <!-- tableRowComponent($row['id'],$row['book_name'],$row['book_publisher'],$row['book_price']); -->
                                    <tr>
                                        
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id'] ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name'] ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher'] ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo '$'.$row['book_price'] ?></td>
                                        <td ><i data-id="<?php echo $row['id']; ?>" class="btnEdit fas fa-edit" name="edit"></i></td>
                                    </tr>
                                    <?php
                                }
                            }
                            
                        ?>
                        
                    </tbody>
                </table>
            </div>
            </form>
        </div>

    </main>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script>
        
    </script> -->
    <script src="./php/main.js"></script>
</body>
</html>