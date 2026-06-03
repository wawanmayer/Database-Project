<?php
include 'connection.php';

$students = [];
$lecture = [];

$query = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($query)) {
    $students[] = $row;
}

$query = mysqli_query($conn, "SELECT * FROM lecture");

while ($row = mysqli_fetch_assoc($query)) {
    $lecture[] = $row;
}

$data = [
    'students' => $students,
    'lecture' => $lecture
];

header('Content-Type: application/json');
echo json_encode($data);

?>



