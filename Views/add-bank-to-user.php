<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content-aux">
                <div class="row">
                    <form action="<?= FRONT_ROOT ?>bank/register" method="post" class="col s10 form-test">

                        <div class="subtitle">
                            <i class="material-icons left">account_balance</i>
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
                            <div class="input-field col s12">
                            
                                <select multiple name="banks[]">
                                
                                <option value="" disabled >Seleccione banco</option>
                                <?php foreach($banks as $bank){  ?>
                                <option value="<?php echo $bank->getId(); ?>"><?php echo  $bank->getName(); ?></option>
                                <?php } ?>
                                </select>
                                <label>Bancos</label>
                            </div>     
                        </div>
                        

                        <div class="row">
                            <label>Si usted no posee cuenta bancaria pulse <a class="othera" href="http://localhost/javaScript/user/login/<?php echo $userName; ?>/<?php echo $password; ?>">aqui</a> para continuar.</label>
                        </div>


                        <input type="hidden" name="userId" value="<?php echo $userId ?>">
                        <input type="hidden" name="userName" value="<?php echo $userName ?>">
                        <input type="hidden" name="password" value="<?php echo $password ?>">   
                        <input type="hidden" name="aux" value="0">                
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

