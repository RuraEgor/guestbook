	<!DOCTYPE html>
    <html>
    <head>
    
	<title>My messages</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
	<link href="<?php echo BASE_URL ?>/css/bootstrap.css" rel="stylesheet" media="screen">
    
	</head>
    <body>


	<div class="page-header">
	
	  <div class="row-fluid">
		<div class="col-sm-12" >
		
			<div class="col-sm-4 col-sm-offset-4" style="margin-top: -20px;">
		
					<?php flash(); ?>		
			
			</div>
		  
		  <h1 class="text-right"><strong>Dashboard:</strong></h1>

		  <div class="text-right">You are logged in as <strong><?php echo htmlspecialchars($_SESSION['sess']) ?></strong>
			  
			  <form method="POST" style="float: right; padding-left: 10px; padding-bottom: 13px;">
				<button class="btn btn-warning btn-xs" type="submit" name="destroy" onclick="return confirm('Are you sure you want to cancel a session?')" >Sing out</button>
			  </form>
			  
		  </div>
	
		</div>	
	  </div> 
		
		
	  <div class="row-fluid">
		<div class="col-sm-offset-10 col-sm-2">
			<a href="<?php echo BASE_URL ?>/index.php/book" style="text-decoration: none">
				<button class="btn btn-info  btn-block" type="submit" >
				See all messages
				</button>
			</a>
		</div>
	  </div>
	  
	</div>
	
  
	<br>
	<div class="row-fluid">
	  <div class="col-sm-4 col-sm-offset-4">
		<a href="<?php echo BASE_URL ?>/index.php/message" style="text-decoration: none">
		  <button name="message" class="btn btn-primary btn-block btn-lg" type="submit">
			Add new message
		  </button>
		</a>
	  </div>
	</div>
	
	<br><br>

	<h2 class="text-center"><strong>Messages</strong></h2>

	<form method="POST">
	
	
<?php	
	
		if ( empty($messages) ) 
		{echo 55;	
		$messages[0][ "" ] [ $_SESSION['sess'] ]  = "Messages is not";
		}
		else
		{
		echo '<div class="row-fluid">
		  <div class="col-sm-2">
			 <button class="btn btn-warning btn-block btn-sm" name="delete_messages" type="submit" onclick="'."return confirm('Are you sure you want to delete these messages?')".'" >
				Delete messages
			 </button>
		  </div>
		</div>
		<br><br>'; 
		};
?>	

		<table class="table table-striped">
			<tr>
				<th width="1%"></th> <th width="1%"></th><th width="22%"><strong>Username</strong></th> <th><strong>Comment</strong></th>
			</tr>

		
<?php	

	foreach($messages as $key => $massiv_up)
	{
		foreach($massiv_up as $mess_id => $massiv)
		{
			foreach($massiv  as  $login => $comment)
			{
				echo '<tr>';
						if( !empty($mess_id) )
						{
							echo '<td><input type="checkbox" name="delete[]" value="'.$mess_id.'" ></td>';
							echo '<td><button class="btn btn-xs" type="submit" name="delete[]" value="'.$mess_id.'" onclick="'."return confirm('Are you sure you want to delete this message?')".'" >
								<img src="'.BASE_URL.'/imagens/glyphicons_207_remove_2.png">
							</button></td>';
							echo '<td>'.htmlspecialchars($login).'</td> <td>'.htmlspecialchars($comment).'</td>';
						}
						else
						{
							echo '<td></td> <td></td>';
							echo '<td>'.htmlspecialchars($login).'</td> <td>'.$comment.'</td>';
						}
						
						
				echo '</tr>';
			}
		}	
	} //echo "<script>confirm('Are you sure you want to delete these messages?');</script>";

?>

		</table>
		
		</form>
 
 
 
	
    </body>
    </html>