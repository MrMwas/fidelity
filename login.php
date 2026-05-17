<?php
session_start();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Example admin login
    if($email == "admin@gmail.com" && $password == "admin123"){

        $_SESSION['admin'] = true;

        header("Location: admin-dashboard.php");
    }
    else{
        echo "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body{
    background:#0f172a;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    font-family:Poppins;
}

.login-box{
    background:#1e293b;
    padding:40px;
    border-radius:20px;
    width:350px;
}

h2{
    color:white;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:14px;
    margin-bottom:15px;
    border:none;
    border-radius:10px;
}

button{
    width:100%;
    padding:14px;
    background:#38bdf8;
    border:none;
</html>