<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="<?= IMG_PATH ?>logo2.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?= CSS_PATH ?>materialize.min.css"  media="screen,projection"/>
    <!--Import custom style-->
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#user").keyup(function(){
				var valor=$(this).val();
  
				if(valor != ""){
					$("#user").css({'borderBottomColor' : '#4973b3' , 'borderBottomWidth' : '1.5px'});
				}else{
					$("#user").css({'borderBottomColor' : ''});
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
		});


		
	</script>
</head>
<body>
        
    <section class="login-section">
        <div class="login-container z-depth-2">            
            
            <div class=".login-imgn hide-on-small-only"> <img src="<?= IMG_PATH ?>econ." alt="Logo" > </div>
            
            <div class="login-form">                

                <?php if ($alert != null): ?>
                <div class="row">
                    <div class="col s12">
                        <div class="card-panel red lighten-4">
                            <i class="material-icons left">error</i>
                            <span class="card-text card-alert"> <?= $alert; ?> </span>                            
                        </div>        
                    </div>                    
                </div>                
                <?php endif; ?> 

                <form action="<?= FRONT_ROOT ?>user/login" method="post">            

                    <div class="row">
                        <div class="input-field col s12">    
                            <img src="<?= IMG_PATH ?>logo.png" alt="Logo" class="logo-brand">                                                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">                            
                            <input id="user" type="text" name="user"  required>
                            <label for="user">Usuario</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password"  required>
                            <label for="password">Contraseña</label>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit" name="action">
                        Conectarse
                        <i class="material-icons right">vpn_key</i>
                    </button>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="link">No esta registrado? <a class="othera" href="user/addUserPath" >Pulse aqui</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <script type="text/javascript" src="<?= JS_PATH ?>materialize.min.js"></script>
</body>
</html>