<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style-register.css">
    <title>Register</title>

</head>
<body>

<div class="container">

    <h2>Register</h2>

    <form action="proses_register.php" method="POST">

    <input type="text"
           name="id"
           placeholder="ID"
           required>

    <input type="text"
           name="name"
           placeholder="Full Name"
           required>

    <input type="password"
           name="password"
           placeholder="Password"
           required>

    <!-- ROLE -->
    <select name="role"
            id="role"
            onchange="showField()"
            required>

        <option value="">Select Role</option>
        <option value="student">Student</option>
        <option value="lecture">Lecturer</option>

    </select>

    <!-- MAJOR -->
    <div id="majorField" style="display:none;">

        <select name="major">
            <option value="">Select Major</option>
            <option value="Information System">Information System</option>
            <option value="Informatics Engineering">Informatics Engineering</option>
            <option value="Civil Engineering">Civil Engineering</option>
            <option value="Electrical Engineering">Electrical Engineering</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option value="PGSD">PGSD</option>
            <option value="DKV">DKV</option>
            <option value="Management">Management</option>
            <option value="Accounting">Accounting</option>
        </select>

    </div>

    <!-- SUBJECT -->
    <div id="subjectField" style="display:none;">

        <select name="subject">
            <option value="">Select Subject</option>
            <option value="Database">Database</option>
            <option value="Programming">Digital Transformation</option>
            <option value="Networking">Management Information System </option>

        </select>

    </div>

    <button type="submit">
        Register
    </button>

</form>

    <div class="link">
        <a href="login.php">
            Already have an account? Login
        </a>
    </div>

</div>

<script>
function showField(){

    let role = document.getElementById("role").value;

    if(role === "student"){
        document.getElementById("majorField").style.display = "block";
        document.getElementById("subjectField").style.display = "none";
    }

    else if(role === "lecture"){
        document.getElementById("majorField").style.display = "none";
        document.getElementById("subjectField").style.display = "block";
    }

    else{
        document.getElementById("majorField").style.display = "none";
        document.getElementById("subjectField").style.display = "none";
    }
}
</script>

</body>
</html>