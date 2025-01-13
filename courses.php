<?php
// Include database connection
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Courses - Moon Brew Coffee</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f8f5f1; color: #4e342e; }
        header { background-color: #6d4c41; color: white; text-align: center; padding: 15px; }
        header nav a { margin: 0 10px; color: #fbe9e7; text-decoration: none; font-weight: bold; }
        header nav a:hover { text-decoration: underline; }
        main { padding: 20px; text-align: left; }
        h2 { color: #5d4037; }
        ul { list-style-type: disc; padding-left: 20px; }
        li { margin-bottom: 15px; background-color: #efebe9; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
        li strong { display: block; margin-bottom: 5px; color: #5d4037; font-size: 1.2rem; }
        footer { background-color: #6d4c41; color: white; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; }
    </style>
</head>
<body>
    <header>
        <h1>Moon Brew Coffee</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="courses.php">Explore Courses</a>
            <a href="login.php">Admin Login</a>
        </nav>
    </header>
    <main>
        <h2>Explore Our Coffee Courses</h2>
        <ul>
            <?php
            // Fetch courses from the database
            $sql = "SELECT id, title, description FROM courses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li>
                            <strong>" . $row['title'] . "</strong>
                            <p>" . $row['description'] . "</p>
                            <button onclick=\"window.location.href='course_details.php?id=" . $row['id'] . "';\">View Details</button>
                          </li>";
                }
            } else {
                echo "<li>No courses available at the moment. Please check back later!</li>";
            }
            ?>
        </ul>
    </main>
    <footer>
        <p>&copy; 2025 Moon Brew Coffee</p>
    </footer>
</body>
</html>
