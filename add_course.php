<!DOCTYPE html>
<html>

<head>
    <title>Add Course</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    // Connect to the database
    try {
        $pdo=new PDO('mysql:host=localhost;dbname=university;charset=utf8mb4','root','');
    } catch (PDOException $e) {
        echo '<p>Error connecting to database: ' . $e->getMessage() . '</p>';
        exit;
    }

    // Retrieve input from the user
    $code = $_POST["course_id"];
    $name = $_POST["title"];
    $dept_name = $_POST["dept_name"];
    $credit = $_POST["credits"];

    // Prepare SQL statement
    $stmt = $pdo->prepare('INSERT INTO course (course_id, title, dept_name, credits) VALUES (:code, :name, :dept_name, :credit)');

    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':dept_name', $dept_name);
    $stmt->bindParam(':credit', $credit);

    // Execute SQL statement and retrieve results
    try {
        if ($stmt->execute()) {
            echo '<h1>Course added successfully.</h1>';
        }
    } catch (PDOException $e) {
        // echo '<p>Error executing SQL statement: ' . $e->getMessage() . '</p>';
        echo '<h1>Cannot add course.</h1>';
        exit;
    }
    ?>
</body>

</html>