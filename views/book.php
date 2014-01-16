	<!DOCTYPE html>
    <html>
    <head>
    
	<title>Guestbook</title>
    
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
			<a href="<?php echo BASE_URL ?>/index.php/my_messages" style="text-decoration: none">
				<button class="btn btn-info btn-block" type="submit" >
				See my messages
				</button>
			</a>
		</div>
	  </div>
	  
	</div>
	
  
	<br>
	<div class="row-fluid">
	  <div class="col-sm-4 col-sm-offset-4">
		<a href="<?php echo BASE_URL ?>/index.php/message" style="text-decoration: none">
		  <button name="message" class="btn btn-primary btn-block btn-lg" type="submit" value="11111">
			Add new message
		  </button>
		</a>
	  </div>
	</div>
	
	<br><br>

	<h2 class="text-center"><strong>Messages</strong></h2>
	
	
	<form method="POST" action="<?php echo BASE_URL ?>/index.php/book">
	
		<table class="table table-striped">
			<tr>
				<th style="width: 0"></th> <th style="max-width: 30%; min-width: 12%"><strong>Username</strong></th> <th><strong>Comment</strong></th>
			</tr>	
<?php	
	
	foreach($messages as $key => $massiv_up)
	{
		foreach($massiv_up as $mess_id => $massiv)
		{
			foreach($massiv  as  $login => $comment)
			{
				echo '<tr>';
				 echo '<td>';
					 if ($_SESSION['sess'] == $login) 
					 {	
						echo '<button class="btn btn-xs" type="submit" name="delete[]" value="'.$mess_id.'" onclick="'."return confirm('Are you sure you want to delete this message?')".'" >
							<img src="'.BASE_URL.'/imagens/glyphicons_207_remove_2.png">
						</button>';
					 }
					 echo'</td> <td>'.htmlspecialchars($login).'</td> <td>'.htmlspecialchars($comment).'</td>';
				 echo '</tr>';
			}
		} 
	}
	
?>	
		</table>
 
	</form>
 
	
    </body>
    </html>