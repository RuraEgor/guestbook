     <!DOCTYPE html>
    <html>
    <head>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap адресс пишется от индексного файла! -->
    <link href="/guestbook/css/bootstrap.css" rel="stylesheet" media="screen">
	
    
 
 <?php 
 
	//require_once '../config.php';
	//require_once '../guestbook/registration.php';
 
if(isset($_POST['login']) && !empty($_POST['login'])) {

 
 $email=($_POST['email']);
 $pass=($_POST['pass']);
 $login=($_POST['login']);
 
require '../guestbook/registration.php'; 
 }
?> 

</head>
<body>