<!---
Sathvik Shivaprakash
1000989203
CSE 6331
Programming Assignment 7
--->

<html>

<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['tname']) ){
	$_SESSION['uname']=$_POST['username'];
	$_SESSION['tname']=$_POST['chatwith'];
}
echo "Logged in as:  ";
echo $_SESSION['uname']."<br>";
echo "Chatting with:  ";
echo $_SESSION['tname'];

// connect
$m = new MongoClient();
// select a database
$db = $m->chatdb;
// select a collection (analogous to a relational database's table)
$collection = $db->chats1;
// add a record
if(strlen($_POST["msg"]) != 0)
	$document = array( "user1" => $_SESSION['uname'],"user2" => $_SESSION['tname'], "message" => $_POST["msg"] );
$collection->insert($document);
// find everything in the collection
?>
<head>

<script  src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function () {
    setInterval(function() {
			$.get("getlatest.php", function (result) {
				$('#load').html(result);
			});
			}, 100);
		});

</script>
</head>
<body>

<div id="load" style="float:center;padding-left:10px;">
	
</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	Message: <input type="text" name="msg">
	<input type="submit" value="send">
</form>

<form action="logout.php" method="post">
  <input type="submit" value="log out">
</form>

<script>
	window.scrollTo(0,document.body.scrollHeight);
</script>
</body>
</html>

<!---
References:
http://crunchify.com/how-to-refresh-div-content-without-reloading-page-using-jquery-and-ajax/
http://www.w3schools.com/html/default.asp
http://www.w3schools.com/php/php_sessions.asp
--->

















