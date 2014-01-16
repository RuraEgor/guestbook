<?php


function data_checking($date) {

mysql_query("INSERT INTO `ron178`.`box` (`login`) VALUES ('$date')");
$res1 =mysql_query("SELECT * FROM `ron178`.`box`") ;

while ($row1 = mysql_fetch_assoc($res1))
{//$row1['login'] = htmlspecialchars($row1['login']); 
$date=$row1['login']; 
mysql_query("DELETE FROM `ron178`.`box`");}

return $date;
}


function flash( $message = '', $class = '' )
{
    //We can only do something if the name isn't empty
    if( $message != '' || isset( $_SESSION['message'] ) )
    {
        //No message, create it		
        if( !empty( $message ) && !empty( $class ) )
        {

            $_SESSION['message'] = $message;
            $_SESSION['class'] = $class;
			
        }
        //Message exists, display it
        elseif( $message == '' && !empty( $_SESSION['message'] ) )
        {	
			$message = $_SESSION['message'];
			$class = $_SESSION['class'];
			
			echo '<div class="'.$class.'">';
			
			echo '<p class="text-center">'.$message.'</p>';
			
			echo '</div>';
			
			unset($_SESSION['message']);
			unset($_SESSION['class']);		
        }
    }
}

?>