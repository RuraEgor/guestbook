<?php
function registration_action()
{
   $connect=open_database_connection();
   require 'guestbook/registration.php';
}
?>