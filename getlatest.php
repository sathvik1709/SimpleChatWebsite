<!---
Sathvik Shivaprakash
1000989203
CSE 6331
Programming Assignment 7
--->

<?php

session_start();
// connect
$m = new MongoClient();
// select a database
$db = $m->chatdb;
// select a collection (analogous to a relational database's table)
$collection = $db->chats1;
// add a record
//if(strlen($_POST["msg"]) != 0)
//	$document = array( "user1" => $_SESSION['uname'],"user2" => $_SESSION['tname'], "message" => $_POST["msg"] );

//$collection->insert($document);
// find everything in the collection
$cursor = $collection->find();
// loop over the results
foreach ($cursor as $obj)
{
	 if($obj['user1'] == $_SESSION['uname'] || $obj['user1'] == $_SESSION['tname'] &&
			$obj['user2'] == $_SESSION['uname'] || $obj['user2'] == $_SESSION['tname'] ) 
	{
		if ($obj['user1'] == $_SESSION['uname']) {
			echo '<font color="red">'.$_SESSION['uname']." : ".$obj['message'] .'</font>'."<br>";
		}
		else{
			echo '<font color="green">'.$_SESSION['tname']." : ".$obj['message'] .'</font>'."<br>";
		}
	}
}
?>

<!---
References:
http://crunchify.com/how-to-refresh-div-content-without-reloading-page-using-jquery-and-ajax/
http://www.w3schools.com/html/default.asp
http://www.w3schools.com/php/php_sessions.asp
--->
