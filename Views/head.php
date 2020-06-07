<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title?></title>
	<link rel="shortcut icon" href="<?= IMG_PATH ?>favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="<?= CSS_PATH ?>materialize.min.css" media="screen,projection" />
	<!--Import custom style-->
	<link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#name").keyup(function(){
				var valor=$(this).val();
  
				if(valor != ""){
					$("#name").css({'borderBottomColor' : '#4973b3' , 'borderBottomWidth' : '1.5px'});
				}else{
					$("#name").css({'borderBottomColor' : ''});
				}
			});

			$("#lastName").keyup(function(){
				var valor=$(this).val();
  
				if(valor != ""){
					$("#lastName").css({'borderBottomColor' : '#4973b3' , 'borderBottomWidth' : '1.5px'});
				}else{
					$("#lastName").css({'borderBottomColor' : ''});
				}
			});

			$("#userName").keyup(function(){
				var valor=$(this).val();
  
				if(valor != ""){
					$("#userName").css({'borderBottomColor' : '#4973b3' , 'borderBottomWidth' : '1.5px'});
				}else{
					$("#userName").css({'borderBottomColor' : ''});
				}
			});

			$("#password").keyup(function(){
				var valor=$(this).val();
  
				if(valor != ""){
					$("#password").css({'borderBottomColor' : '#4973b3' , 'borderBottomWidth' : '1.5px'});
				}else{
					$("#password").css({'borderBottomColor' : ''});
				}
			});

			$("#amount-container").css({'margin-top':'4.3%'});
			$("#reason-container").css({'margin-top':'4.3%'});
			$("#contributor-container").css({'margin-top' : '4.3%'});
			$("#installments-container").css({'margin-top' : '4.3%'});
			$("#bank-container").css({'margin-top' : '4.3%'});
			$("#date-container").css({'margin-top':'4.3%'});
			$("#footer-container").css({'margin-top':'590.59px'});
			$('.fixed-action-btn').floatingActionButton();

			
		});

		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.fixed-action-btn');
			var instances = M.FloatingActionButton.init(elems, {
			direction: 'left'
			});
		});


		
	</script>
</head>