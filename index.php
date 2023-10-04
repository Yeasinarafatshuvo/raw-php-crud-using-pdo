<?php 
session_start();
include('db_connection.php')
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php 
                unset($_SESSION['message']);
                endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h3>PHP PDO CRUD
                            <a href="student_add.php" class="btn btn-primary float-right">Add students</a>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-boardered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM students";
                                $statement = $conn->prepare($query);
                                $statement->execute();

                                $statement->setFetchMode(PDO::FETCH_OBJ);
                                $result = $statement->fetchAll();

                                if(count($result) > 0){
                                    foreach ($result as $key => $row) {
                                        echo '<tr>';
                                        echo '<td>' . $row->id . '</td>';
                                        echo '<td>' . $row->name . '</td>';
                                        echo '<td>' . $row->email . '</td>';
                                        echo  '<td>
                                                    <a href="student_edit.php?id=' .$row->id. '" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="delete_student" value="'.$row->id.'" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>';
                                        echo '</tr>';
                                    }

                                }else{
                                   echo 
                                    '<tr>
                                        <td colspan="5">NO Recode Found</td>
                                    </tr>';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


















    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>    
</body>
</html>