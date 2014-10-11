<!---
Sathvik Shivaprakash
1000989203
CSE 6331
Programming Assignment 7
--->
<html>
<body>

<h1>logged out<h1>
<?php
session_start();

unset($_SESSION['uname']);
unset($_SESSION['tname']) 
?>

</body>
</html>

<!---
References:
http://crunchify.com/how-to-refresh-div-content-without-reloading-page-using-jquery-and-ajax/
http://www.w3schools.com/html/default.asp
http://www.w3schools.com/php/php_sessions.asp
--->
