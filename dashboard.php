<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'] ?? "User";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Fetch Data Example</title>
    <link rel="stylesheet" href="style-dashboard.css">
</head>
<body>


    <div class="header">
        <span> Anyeong, <?php echo $name; ?>!</span>
        <a href="logout.php">
            <button class="logout">Logout</button>
        </a>
    </div>

        <h1>Campus Database</h1>

        <div class="forox">
            <button onclick="showTable('student')">Students</button>

            <button onclick="showTable('lecture')">Lectures</button>
        </div>

    <div id="studentBox" style="display: none;">
    <h2>Student Data</h2>

        <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Major</th>
            </tr>
        </thead>
        <tbody id="studentTable"></tbody>
        </table>

        </div>

    <div id="lectureBox" style="display: none;">
    <h2>Lecture Data</h2>

        <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Lecturer Name</th>
                <th>Subject</th>
            </tr>
        </thead>
        <tbody id="lectureTable"></tbody>
        </table>

        </div>

        <div id="result"></div>

    <script>
        fetch('data.php')
        .then(response => response.json())
        .then(data => {

            let studentOutput = '';
            let lectureOutput = '';

            data.students.forEach((student, index) => {
                studentOutput += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${student.id}</td>
                    <td>${student.name}</td>
                    <td>${student.major}</td>
                </tr>
                `;
            });

            data.lecture.forEach((lecture, index) => {
                lectureOutput += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${lecture.ID}</td>
                    <td>${lecture.Name}</td>
                    <td>${lecture.Subject}</td>
                </tr>
                `;
            });

            document.getElementById('studentTable').innerHTML = studentOutput;
            document.getElementById('lectureTable').innerHTML = lectureOutput;
        });


        //tombol
        function showTable(type) {

            let studentBox = document.getElementById("studentBox");
            let lectureBox = document.getElementById("lectureBox");

            if (type === "student") {
                studentBox.style.display = "block";
                lectureBox.style.display = "none";
            }

            if (type === "lecture") {
                lectureBox.style.display = "block";
                studentBox.style.display = "none";
            }
        }
        </script>

</body>
</html>