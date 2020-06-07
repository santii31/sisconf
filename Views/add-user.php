<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content-aux">
                <div class="row">
                    <form action="<?= FRONT_ROOT ?>user/register" method="post" class="col s10 form-test">

                        <div class="subtitle">
                            <i class="material-icons left">account_circle</i>
                            <h2>
                                <?= $title ?>
                            </h2>
                        </div>
                        <div class="divider mb-divider"></div>

                        <?php if ($success != null): ?>
                        <div class="row">
                            <div class="col s6">
                                <div class="card-panel green lighten-4">
                                    <i class="material-icons left">check</i>                            
                                    <span class="card-text card-success"> <?= $success; ?> </span>
                                </div>        
                            </div>                    
                        </div>    
                        <?php endif; ?>        

                        <?php if ($alert != null): ?>
                        <div class="row">
                            <div class="col s6">
                                <div class="card-panel red lighten-4">
                                    <i class="material-icons left">error</i>
                                    <span class="card-text card-alert"> <?= $alert; ?> </span>                            
                                </div>        
                            </div>                    
                        </div>                
                        <?php endif; ?>

                        <div class="row">
                            <div class="input-field col s6">
                                <?php if (isset($inputs["name"])): ?>              
                                <input id="name" type="text" name="name"  value="<?= $inputs["name"]; ?>" required>
                                <?php else: ?>
                                <input id="name" type="text" name="name"  required>
                                <?php endif; ?>                                
                                <label for="name">Nombre</label>
                            </div>
                            <div class="input-field col s6">
                                <?php if (isset($inputs["lastName"])): ?>              
                                <input id="lastName" type="text" name="lastName"  value="<?= $inputs["lastName"]; ?>" required>
                                <?php else: ?>
                                <input id="lastName" type="text" name="lastName"  required>
                                <?php endif; ?>                                                                
                                <label for="lastName">Apellido</label>
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <?php if (isset($inputs["userName"])): ?>              
                                <input id="userName" type="text" name="userName"  value="<?= $inputs["userName"]; ?>" required>
                                <?php else: ?>
                                <input id="userName" type="text" name="userName"   required>
                                <?php endif; ?>                                                                 
                                <label for="email">Nombre de usuario</label>
                            </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="password" type="password" name="password"  required>
                                <label for="password">Contraseña</label>
                            </div>                                                             
                        </div>                     
                        <div class="row">
                            <div class="col s12 center-align">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Añadir
                                    <i class="material-icons right">chevron_right</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  

<script>  

    //Ejecutamos la funcion al cargar
$(function() {
  check();

//funcion que se ejecuta al cambiar valor del input
  $("#userName").keyup(function() {
    check();
  });
});

//valida el color
function check() {
  var opcion = $("#valor").val();

  if (opcion == 1) {
    $("#bad").css("background-color", "red");
  } else if (opcion == 0) {
    $("#bad").css("background-color", "green");
  } else {
    $("#bad").css("background-color", "yellow");
  }
}

</script>