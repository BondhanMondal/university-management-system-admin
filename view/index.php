<!doctype html>
<html>
<body>
<fieldset>
<?php
session_start();

$_SESSION['username'] = "";
$_SESSION['flag'] = 0;


include '../controller/includes/head.php'?>
<br>
</fieldset>
<fieldset style="height:800px;">
<center><h2 style="color:green;font-size:40px;font-weight:bold;margin:300px;">Please Register/Login To Continue!</h2></center>
</fieldset>
<fieldset>
<?php include '../controller/includes/footer.php' ?>
</fieldset>
</body>
</html>
