<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content">
                <div class="row">
                    <form action="<?= FRONT_ROOT ?>check/addCheck" method="post" class="col s10 form-test">

                        <div class="subtitle">
                            <i class="material-icons left">work</i>
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
                        <div class="input-field col s2">
                        
                        <p>
                            <label>
                                <input class="with-gap" name="currency" value="pesos" type="radio" checked />
                                <span>AR$</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap" name="currency" value="dolar" type="radio" checked />
                                <span>US$</span>
                            </label>
                        </p>
                                
                        </div>
                            <div id="amount-container" class="input-field col s2">
                                <?php if (isset($inputs["amount"])): ?>              
                                <input id="amount" type="number" name="amount"  value="<?= $inputs["amount"]; ?>" required>
                                <?php else: ?>
                                <input id="amount" type="number" name="amount"  required>
                                <?php endif; ?>                                
                                <label for="amount">Monto</label>
                            </div>
                            <div id="contributor-container" class="input-field col s5">
                                <?php if (isset($inputs["contributor"])): ?>              
                                <input id="contributor" type="text" name="contributor"  value="<?= $inputs["contributor"]; ?>" required>
                                <?php else: ?>
                                <input id="contributor" type="text" name="contributor"   required>
                                <?php endif; ?>                                                                 
                                <label for="contributor">Aportante</label>
                            </div>                      
                            
                                                 
                        </div>

                        <br>
                        


                        <div class="row">
                                

                                <div class="input-field col s5">
                                    <?php if (isset($inputs["date_of_issue"])): ?>              
                                    <input id="date_of_issue" type="date" name="date_of_issue"  value="<?= $inputs["date_of_issue"]; ?>" required>
                                    <?php else: ?>
                                    <input id="date_of_issue" type="date" name="date_of_issue" value="<?php echo date("Y-m-d"); ?>" required>
                                    <?php endif; ?>                                
                                    <label for="date_of_issue">Fecha de emision</label>
                                </div>

                                <div class="input-field col s5">
                                    <?php if (isset($inputs["expiration_date"])): ?>              
                                    <input id="expiration_date" type="date" name="expiration_date"  value="<?= $inputs["expiration_date"]; ?>" required>
                                    <?php else: ?>
                                    <input id="expiration_date" type="date" name="expiration_date"  required>
                                    <?php endif; ?>                                
                                    <label for="expiration_date">Fecha de vencimiento</label>
                                </div>

                                
                        </div>

                        <div class="row">
                                
                                <div class="input-field col s10">
                                    <select name="idBank">
                                       
                                        <option value="" disabled selected>Seleccione aqui</option>
                                        <?php foreach($Banks as $bank){ ?>
                                        <option value="<?php echo $bank->getId(); ?>"><?php echo $bank->getName(); ?></option>
                                        <?php } ?>
                                    </select>
                                    <label>Banco</label>
                                </div> 

                        </div>

                        <input type="hidden" name="id_user" value="<?php echo $user->getId(); ?>"  >

                                          
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





                                