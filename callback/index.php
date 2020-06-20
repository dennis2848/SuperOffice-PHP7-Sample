<?php
session_start();
include_once('../helpers/SessionHelper.php');
        include_once(dirname(__FILE__).'/../settings.php'); 
         
          
        ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SO test</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  
	</head>
	<body>
		<div class="wrapper">
        Wait....
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){ 
            var code = unescape(location.hash.split('&')[1].split('=')[1]);
            var state = location.hash.split('&')[0].split('=')[1];
            $.post( "ajax.php", { 'code': code, 'state': state }, function( data ) {
                 
                console.log(data);
                window.location = '<?php echo CALLBACK_REDIRECT; ?>';
                }, "json");
        });
        </script>
         
 
</body>
</html>