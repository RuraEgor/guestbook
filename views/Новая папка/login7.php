<?php
session_start();
if (empty($_SESSION['sess'])) 
{$name="";} else {$name="You are logged in as ".$_SESSION['sess'];}
?>


<?php $title = 'Sign in' ?>
<?php $css=BASE_URL."/css/style-login.css" ?>

<?php ob_start() ?>
<br>

    <ul>
     <li><a href="<?php echo BASE_URL ?>/">Registration</a></li>
     <li><a href="<?php echo BASE_URL ?>/index.php/login">Sign in</a></li>
     <li><a href="<?php echo BASE_URL ?>/index.php/book">Guestbook</a></li>
   </ul>

<br><br>
<form method="POST">
<input type="submit" name="ok_go" value="Suspend session" />
</form>
<?php 
if(isset($_POST['ok_go'])) {unset($_SESSION['sess']); session_destroy();
echo '<script>window.location.href ="'.BASE_URL.'/index.php/login"</script>';
}
?>
 
<?php

if($connect == true)
{

echo "<br>" ;


if (empty($_SESSION['sess'])) {

$a="7";


echo "<br><br>" ;


echo '<div class="container">';
echo '<form class="form-signin" method="POST" action="'.BASE_URL.'/index.php/login">';

echo '<input class="input-block-level" type="text" name="login" placeholder="Login"';
if (isset($_POST["login"])) {$login=htmlspecialchars($_POST["login"]);}; echo 'value="'.$login.'">';

echo '<input class="input-block-level" type="password" name="pass" placeholder="Password"';
if (isset($_POST["pass"])) {$pass=htmlspecialchars($_POST["pass"]);}; echo 'value="'.$pass.'">';

echo '<button class="btn btn-primary" class="span4" type="submit">Login</button></form></div>';

echo '<br/><br/>';



if(isset($_POST['pass'])) {$pass = $_REQUEST["pass"]; $pass = htmlspecialchars($pass); } else {$pass =''; }
if(isset($_POST['login'])) {$login = $_REQUEST["login"]; $login = htmlspecialchars($login); } else {$login =''; }

if((isset($_POST['login'])) and (isset($_POST['pass'])) ) {

if(isset($login) && isset($pass) && !empty($login) && !empty($pass))
{  
//$res =mysql_query("SELECT * FROM `users`") ;

$res=take_login_and_pass();

while ($row = mysql_fetch_assoc($res))
{
$row['login'] = htmlspecialchars($row['login']);
$row['pass'] = htmlspecialchars($row['pass']);

if ($login==$row['login'] && $pass==$row['pass']) {$_SESSION['sess']=$login; $a=$name;
echo '<script>window.location.href ="'.BASE_URL.'/index.php/login"</script>';
break; } 
else {$a="login or password is wrong!";}
}

}  else {$a="Some text fields are empty!";}; }

if ($a==7) {$a="";} 

print "<div id='error'><p align='center'>$a</p></div>";
}
print "<div class='confirmation'><p align='center'>$name</p></div>";
}

else
{
exit("Error connecting to the DB!") ;
}  
?>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>