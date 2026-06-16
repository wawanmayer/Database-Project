<?php

session_start();
include "connection.php";

$id = $_POST['id'];
$password = $_POST['password'];

$query = mysqli_query($conn, 
"SELECT * FROM users 
WHERE id='$id' 
AND password='$password'");

if (mysqli_num_rows($query) > 0) {

    $user = mysqli_fetch_assoc($query);

    if ($user['role'] == "student") {

        $ambil = mysqli_query($conn,
        "SELECT name FROM students WHERE id='$id'");

        $data = mysqli_fetch_assoc($ambil);

        $_SESSION['name'] = $data['name'];

    } else {

        $ambil = mysqli_query($conn,
        "SELECT Name FROM lecture WHERE ID='$id'");

        $data = mysqli_fetch_assoc($ambil);

        $_SESSION['name'] = $data['Name'];
    }

    $_SESSION['id'] = $id;
    $_SESSION['role'] = $user['role'];

    header("Location: dashboard.php");
    exit();

} else {

    echo "ID atau Password salah!";
}

?>