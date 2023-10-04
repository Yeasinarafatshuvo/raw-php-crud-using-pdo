<?php
session_start();


include('db_connection.php');

if(isset($_POST['delete_student'])){

    $student_id = $_POST['delete_student'];

    try{
        $query = "DELETE FROM students  WHERE id=:stud_id LIMIT 1";
        $statement = $conn->prepare($query);
        $data = [':stud_id' => $student_id];
        $query_execute = $statement->execute($data);


        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
        
            header('Location: index.php'); //redirect back to index page
            exit(0);

        }else{
            $_SESSION['message'] = " Not Deleted";
       
            header('Location: index.php'); //redirect back to index page
            exit(0);
        }



    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['update_student_btn']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $student_id = $_POST['student_id'];

    try{
        $query = "UPDATE students SET name=:name, email=:email WHERE id=:stud_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':name' => $name,
            ':email' => $email,
            ':stud_id' => $student_id
        ];

        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
        
            header('Location: index.php'); //redirect back to index page
            exit(0);

        }else{
            $_SESSION['message'] = " Not Updated";
       
            header('Location: index.php'); //redirect back to index page
            exit(0);
        }


    }catch(PDOException $e){
        echo  $e->getMessage();
    }

}

if(isset($_POST['save_student_btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];


    $query = "INSERT INTO students (name, email) VALUES (:name, :email)";
    $query_run = $conn->prepare($query);


    $data = [
        ':name' => $name,
        ':email' => $email
    ];

    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        
        header('Location: index.php'); //redirect back to index page
        exit(0);
    }else{
        $_SESSION['message'] = " Not Inserted";
       
        header('Location: index.php'); //redirect back to index page
        exit(0);
    }
}




?>