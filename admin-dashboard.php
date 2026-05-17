<?php
session_start();

// Example login session
// $_SESSION['admin'] = true;

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "realestate");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Property
if(isset($_POST['add_property'])){

    $title = $_POST['title'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "uploads/".$image);

    $sql = "INSERT INTO properties(title, price, location, description, image)
            VALUES('$title','$price','$location','$description','$image')";

    $conn->query($sql);
}

// Delete Property
if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    $conn->query("DELETE FROM properties WHERE id='$id'");

    header("Location: admin-dashboard.php");
}

$result = $conn->query("SELECT * FROM properties ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#0f172a;
    color:white;
</html>