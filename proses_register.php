<?php
include 'connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role'];

$cek = mysqli_query($conn,
"SELECT * FROM users WHERE id='$id'");

if(mysqli_num_rows($cek) > 0){
    header("Location: register.php?msg=exist");
    exit();
}

mysqli_query($conn,
"INSERT INTO users(id,password,role)
VALUES('$id','$password','$role')");

if($role == 'student'){

    $major = $_POST['major'];

    mysqli_query($conn,
    "INSERT INTO students(id,name,major)
    VALUES('$id','$name','$major')");

}else{

    $subject = $_POST['subject'];

    mysqli_query($conn,
    "INSERT INTO lecture(ID,Name,Subject)
    VALUES('$id','$name','$subject')");

}

header("Location: login.php");
exit();
?>