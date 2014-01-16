<?php
session_start();
?>



<?php $title = 'Guestbook' ?>
<?php $css=BASE_URL."/css/style-book.css" ?>
<?php ob_start() ?>
<br>


       <ul>
     <li><a href="<?php echo BASE_URL ?>/">Registration</a></li>
     <li><a href="<?php echo BASE_URL ?>/index.php/login">Sign in</a></li>
     <li><a href="<?php echo BASE_URL ?>/index.php/book">Guestbook</a></li>
	 <li><a href="<?php echo BASE_URL ?>/index.php/book">Guestbook7</a></li>
   </ul>


<br><br>

<form method="POST">
<input type="submit" name="ok_go" value="Suspend session" />
</form>
<?php 
if(isset($_POST['ok_go'])) {unset($_SESSION['sess']); session_destroy();
echo '<script>window.location.href="'.BASE_URL.'/index.php/book"</script>';
}
?>

<br><br>

<?php
/*
include 'db-data.php';

$connect = mysql_connect($host, $user, $pass);  

mysql_select_db($db); 

mysql_query('SET NAMES UTF8');

if($connect == true)    
{*/
$a="7";
$send_mes=1;

if (!empty($_SESSION['sess'])) {$login=$_SESSION['sess'];



echo "<br><br>" ;


echo '<div class="container">';
echo '<form class="form-signin" method="POST" action="'.BASE_URL.'/index.php/book">';
echo 'Login: '.$login.'<br><br>';

echo '<textarea id="text" type="text" name="comment" placeholder="Comment"></textarea><br/>';

echo '<button class="btn btn-primary" type="submit">Send</button></form></div>';

echo '<br/>';



if(isset($_POST['comment'])) {$comment = $_REQUEST["comment"];} else {$comment =''; }

if(isset($_POST['comment'])) {

if(isset($comment) && !empty($comment))
{
//mysql_query("INSERT INTO `ron178`.`messages` (`login`, `comment`) VALUES ('$login', '$comment')");
write_message($login,$comment);
   	
echo '<script>window.location.href="'.BASE_URL.'/index.php/book"</script>';
} else {$a="Text box is blank!";}

} 
if ($a==7) {$a="";} 
print "<div id='error'><p align='center'>$a</p></div>";
echo $b;
}
/*}
else
{
exit("Error connecting to the DB!") ;
}  */
?>

<?php

foreach ($messages as $post):

//$res =mysql_query("SELECT * FROM `messages` ORDER BY `id` DESC") ;
//while ($row = mysql_fetch_assoc($res))    
//{
//echo $row[id] . "<br>";
$post['login']=htmlspecialchars($post['login']);
echo "<font color='red' size='4px'>Пишет</font>: <font color='green' size='4px'>".$post['login']."</font><br>" ;
$post['comment'] = htmlspecialchars($post['comment']);
echo $post['comment']. "<br>" ;  
echo "-------------------------------------"."<br><br>";
endforeach; 

?>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>