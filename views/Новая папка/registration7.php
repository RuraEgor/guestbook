<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<!DOCTYPE html>

<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="css/style-registration.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" >

   </head>

    <body>
	


   <ul>
     <li><a href="<?php echo BASE_URL ?>/">Registration</a></li>
     <li><a href="<?php echo BASE_URL ?>/index.php/login">Sign in</a></li>
     <li><a href="<?php echo BASE_URL ?>/index.php/book">Guestbook</a></li>
   </ul>

<?php
//error_reporting(0); 

if($connect == true)
{

echo "<br><br><br><br>" ;



if(isset($_POST['email'])) {$email = $_REQUEST["email"];} else {$email =''; }
if(isset($_POST['pass'])) {$pass = $_REQUEST["pass"];} else {$pass =''; }
if(isset($_POST['login'])) {$login = $_REQUEST["login"];} 

echo '<div class="container">';
echo '<form class="form-signin" method="POST" action="'.BASE_URL.'/">';
echo '<h2 class="form-signin-heading">Please register</h2>';


echo '<form class="form-signin" method="POST" action="../controllers/registration.php">';
echo '<input class="input-block-level" type="email" name="email" placeholder="Email address" value="'.$email.'">'; 

echo '<input class="input-block-level" class="span4" type="password" name="pass" placeholder="Password" value="'.$pass.'">';

echo '<input class="input-block-level" type="text" name="login" placeholder="Login" value="'.$login.'">';

echo '<button class="btn btn-primary" type="submit">Registration</button></form></div>';

echo '<br/><br/>';

//$login=htmlspecialchars($_POST["login"]);



$log=1;

if(isset($_POST['email'])) {$email = $_REQUEST["email"];} else {$email =''; }
if(isset($_POST['pass'])) {$pass = $_REQUEST["pass"];} else {$pass =''; }
if(isset($_POST['login'])) {$login = $_REQUEST["login"];} else {$login =''; }

if((isset($_POST['login'])) and (isset($_POST['pass'])) and (isset($_POST['email'])) ) {

if(isset($login) && isset($pass) && isset($email) && !empty($login) && !empty($pass) && !empty($email))
{
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//$res =mysql_query("SELECT * FROM `ron178`.`users`") ;
$res=take_login_and_pass();

while ($row = mysql_fetch_assoc($res))
{$row['login'] = htmlspecialchars($row['login']);
 if ($login==$row['login']) {$a="This username registered! Use another!"; $log=2; break;};}

 if ($log==1) { 
/*
$email = mysql_real_escape_string($email);
$pass = mysql_real_escape_string($pass);

$login=html_entity_decode($login);
$login = mysql_real_escape_string($login);

mysql_query("INSERT INTO `users` (`email`, `pass`,`login`) VALUES ('$email', '$pass','$login' )");*/
addition_new_user($email,$pass,$login);

$a="Registration was successful!"; 

$reg=7; //$login;

//ob_start();

//$content777 = ob_get_clean();
//include 'controllers/registration.php';
//require 'index.php';
//exit; 
}
 
} else {$a="E-Mail is not valid!";}
} else {$a="Some text fields are empty!";}

print "<div id='error'><p align='center'>$a</p></div>";

}
}

else
{
exit("Error connecting to the DB!") ;
}  

?>

    </body>
</html>

