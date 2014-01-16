<?php $title = 'Registration' ?>
<?php $css="css/style-registration.css" ?>
<?php ob_start() ?>
<br>

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


echo '<div class="container">';
echo '<form class="form-signin" method="POST" action="'.BASE_URL.'/">';
echo '<h2 class="form-signin-heading">Please register</h2>';

echo '<input class="input-block-level" type="email" name="email" placeholder="Email address"'; 
if (isset($_POST["email"])) {$email=htmlspecialchars($_POST["email"]);}; echo 'value="'.$email.'">';

echo '<input class="input-block-level" class="span4" type="password" name="pass" placeholder="Password"';
if (isset($_POST["pass"])) {$pass=htmlspecialchars($_POST["pass"]);}; echo 'value="'.$pass.'">';

echo '<input class="input-block-level" type="text" name="login" placeholder="Login"';
if (isset($_POST["login"])) {$login=htmlspecialchars($_POST["login"]);}; echo 'value="'.$login.'">';

echo '<button class="btn btn-primary" type="submit">Registration</button></form></div>';

echo '<br/><br/>';





$log=1;

if(isset($_POST['email'])) {$email = $_REQUEST["email"];} else {$email =''; }
if(isset($_POST['pass'])) {$pass = $_REQUEST["pass"];} else {$pass =''; }
if(isset($_POST['login'])) {$login = $_REQUEST["login"]; $login=htmlspecialchars($login);} else {$login =''; }

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

$a="Registration was successful!";  }
 
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

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>