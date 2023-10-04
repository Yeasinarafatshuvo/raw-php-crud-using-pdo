<?php
include('db_connection.php');
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
    <a href="student_add.php">Add Students</a>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>PHP PDO CRUD
                            <a href="index.php" class="btn btn-primary float-right">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id']))
                            {
                                $student_id = $_GET['id'];

                                $query = "SELECT * FROM students where id = :stud_id LIMIT 1";
                                $statement = $conn->prepare($query);
                                $data = [
                                    ':stud_id'  => $student_id
                                ];

                                $statement->execute($data);

                                $result = $statement->fetch(PDO::FETCH_OBJ);

                            }
                        ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" value="<?= $result->id; ?>" name="student_id" >
                            <div class="mb-3" >
                                <label for="name">Enter Your Name</label>
                                <input type="text" class="form-control" value="<?= $result->name; ?>" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email">Enter Your Email</label>
                                <input type="text" class="form-control"  value="<?= $result->email; ?>" name="email">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="update_student_btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


















    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>    
</body>
</html>