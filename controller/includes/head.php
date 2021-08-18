<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <span style="font-size:40px;color:green">U</span><span style="font-size:25px">niversity Management System</span> &nbsp;&nbsp;
    <style>
        a {
            font-size: 20px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    
    $home = "../view/index.php";
    $login = "login.php";
    $reg = "registration.php";
    $blank = "";
    $logout = "../controller/logout.php";
        if(!($_SESSION['flag']))
           echo "<a href='$home'>Home</a>&nbsp;&nbsp<a href='$login'>Login</a>&nbsp;&nbsp<a href='$reg'>Registration</a>";
        else 
           echo"Logged in as <a href=$blank>".$_SESSION['username']."</a>&nbsp;&nbsp&nbsp;&nbsp<a href='$logout'>Logout</a>";
        
    ?>
</body>
</html>