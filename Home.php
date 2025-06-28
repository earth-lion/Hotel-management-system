<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    $userName = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Home.css">
    <title>Home</title>
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome, <?php echo $userName; ?></h1>
            <div class="buttons">
                <a href="search.php">البحث عن نزيل موجود </a>
                <a href="cuostamer data.php">اضافة نزيل جديد</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
</body>

</html>

<?php 
} else {
    header("Location: index.php");
    exit();
}
?>
