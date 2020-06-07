<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content">
                <div class="row">
                    <form action="<?= FRONT_ROOT ?>income/addIncome" method="post" class="col s10 form-test">

                        <div class="subtitle">
                            <i class="material-icons left">supervisor_account</i>
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

                        <label>Deposito efectuado en cuenta perteneciente al banco: <label class="othera"><?php echo $bankName; ?></label> . </label>

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
                            <div id="reason-container" class="input-field col s5">
                                <?php if (isset($inputs["reason"])): ?>              
                                <input id="contributor" type="text" name="contributor"  value="<?= $inputs["contributor"]; ?>" required>
                                <?php else: ?>
                                <input id="contributor" type="text" name="contributor"   required>
                                <?php endif; ?>                                                                 
                                <label for="reason">Aportante</label>
                            </div>                      
                            <div id="date-container" class="input-field col s3">
                                <?php if (isset($inputs["date"])): ?>              
                                <input id="date" type="date" name="date"  value="<?= $inputs["date"]; ?>" required>
                                <?php else: ?>
                                <input id="date" type="date" name="date" value="<?php echo date("Y-m-d"); ?>" required>
                                <?php endif; ?>                                
                                <label for="date">Fecha</label>
                            </div> 
                            <input type="hidden" name="payment_method" value="bank_deposit">
                            <input type="hidden" name="userId" value="<?php echo $user->getId(); ?>"  >
                            <input type="hidden" name="bankId" value="<?php echo $bankId; ?>">
                                                 
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
