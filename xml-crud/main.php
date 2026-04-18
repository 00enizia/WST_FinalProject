<?php
$xml = simplexml_load_file('names.xml');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="overlay">

    <!-- HEADER -->
    <div class="header">
        <div class="header-content">

            <img src="photos/CICTLogo.png" class="logo">

            <div class="title">
                <h1>Bulacan State University</h1>
                <p>College of Information and Communications Technology</p>
                <h2>Student Management System</h2>
            </div>

            <img src="photos/bulsulogotrans.png" class="logo">
			
			<div class="developers">
            <span>Developed by:</span>
            <p>Jennylyn D. Dionecio</p>
            <p>Kerstine Cindy Karube</p>
            </div>

        </div>
    </div>

    <!-- MAIN -->
    <div class="container">

        <h3>Add New Student</h3>

        <!-- FORM -->
        <form action="add.php" method="POST">

            <!-- Auto ID -->
            <div>
                <label>Student ID</label>
                <input type="text" placeholder="Auto Generated (2026-XXXXXX)" disabled>
            </div>

            <div>
                <label>Full Name</label>
                <input type="text" name="NAME" placeholder="Enter full name" required>
            </div>

            <div>
                <label>Course</label>
                <select name="COURSE" required>
                    <option value="">Select Course</option>
                    <option>BSIT</option>
                    <option>BSCS</option>
                    <option>BSIS</option>
                </select>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="EMAIL" placeholder="Enter email" required>
            </div>

            <div>
                <label>Phone</label>
                <input type="text" name="PHONE" placeholder="Enter phone number" required pattern="[0-9]{11}">
            </div>

            <button type="submit">Add Student</button>

        </form>

        <h3>Student Records</h3>

        <!-- SEARCH -->
        <input type="text" id="search" placeholder="Search student..." 
        style="margin-bottom:10px; padding:8px; width:100%;">

        <!-- TABLE -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            <?php foreach($xml->STUDENT as $student): ?>
            <tr>
                <td><?php echo $student->IDNO; ?></td>
                <td><?php echo $student->NAME; ?></td>
                <td><?php echo $student->COURSE; ?></td>
                <td><?php echo $student->EMAIL; ?></td>
                <td><?php echo $student->PHONE; ?></td>

                <td>
                    <a href="edit.php?id=<?php echo $student->IDNO; ?>" class="edit">Edit</a>
                    <a href="delete.php?id=<?php echo $student->IDNO; ?>" class="delete" onclick="return confirm('Delete this student?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>

    </div>

</div>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById("search").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("table tr");

    rows.forEach((row, index) => {
        if(index === 0) return;
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(value) ? "" : "none";
    });
});
</script>

</body>
</html>