<?php

$id = $_GET['id'];
$xml = simplexml_load_file('names.xml');

foreach($xml->STUDENT as $student){
    if($student->IDNO == $id){
        $data = $student;
        break;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
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
                <h2>Edit Student</h2>
            </div>

            <img src="photos/bulsulogotrans.png" class="logo">

        </div>
    </div>

    <!-- FORM -->
    <div class="container">

        <h3>Update Student Information</h3>

        <form action="update.php" method="POST">

            <!-- hidden old ID -->
            <input type="hidden" name="oldID" value="<?php echo $data->IDNO; ?>">

            <!-- ID (READONLY) -->
            <input type="text" name="IDNO" value="<?php echo $data->IDNO; ?>">

            <input type="text" name="NAME" value="<?php echo $data->NAME; ?>" required>
            <select name="COURSE">
    <option <?php if($data->COURSE=="BSIT") echo "selected"; ?>>BSIT</option>
    <option <?php if($data->COURSE=="BSCS") echo "selected"; ?>>BSCS</option>
    <option <?php if($data->COURSE=="BSIS") echo "selected"; ?>>BSIS</option>
</select>
            <input type="email" name="EMAIL" value="<?php echo $data->EMAIL; ?>" required>
            <input type="text" name="PHONE" value="<?php echo $data->PHONE; ?>" required>

            <button type="submit">Update Student</button>

        </form>

        <a href="main.php" style="display:block; text-align:center; margin-top:10px;">Back</a>

    </div>

</div>

</body>
</html>