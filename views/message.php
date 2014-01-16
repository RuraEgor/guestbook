
	<!DOCTYPE html>
    <html>
    <head>
    <title>Forma for messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="<?php echo BASE_URL ?>/css/bootstrap.css" rel="stylesheet" media="screen">
    </head>
    <body>
	
	
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-sm-6 col-sm-offset-3">
		  
          <form method="post" class="form-signin" action="<?php echo BASE_URL ?>/index.php/message" role="form">
	
			<h3 class="form-signin-heading">Forma for messages</h3> 
			
			<div class="<?php echo ( empty($errors) ) ? '' : "alert alert-danger" ?>" >
			  
				<p class="text-center"><?php print (isset($comment)) ? join("<br>",$comment) : '' ?></p>
				
			</div>
			
			<div class="form-group">
			  <textarea class="form-control btn-block" rows="5" name="comment" placeholder="Comment" value="" autofocus></textarea>
			</div>
	
			<div class="form-group">
			  <button type="submit" class="btn btn-lg btn-primary btn-block">Send message</button>
			</div>
			
		  </form>
		  
		  <p class="text-center">OR</p>

		  <a href="<?php echo BASE_URL ?>/index.php/book" style="text-decoration: none">
		    <button class="btn btn-lg btn-primary btn-block" type="submit">Back to guestbook</button>
		  </a>

		</div>
	  </div>
	</div>	
	
	</body>
    </html>