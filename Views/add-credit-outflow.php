<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content">
                <div class="row">
                    <form action="<?= FRONT_ROOT ?>buyCredit/addBuyCredit" method="post" class="col s10 form-test">

                        <div class="subtitle">
                            <i class="material-icons left">payment</i>
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

                        <label>Egreso efectuado con tarjeta de credito perteneciente al banco: <label class="othera"><?php echo $bankName; ?></label> . </label>

                        <div class="row">

                        

                        <div class="input-field col s2">
                        
                        
                        <p>
                            <label>
                                <input class="with-gap" name="currency" value="dolar" type="radio" checked />
                                <span>US$</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap" name="currency" value="pesos" type="radio" checked />
                                <span>AR$</span>
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
                            <div id="installments-container" class="input-field col s2">
                                <?php if (isset($inputs["installments"])): ?>              
                                <input id="installments" type="text" name="installments"  value="<?= $inputs["installments"]; ?>" required>
                                <?php else: ?>
                                <input id="installments" type="text" name="installments"   required>
                                <?php endif; ?>                                                                 
                                <label for="installments">Cuotas</label>
                            </div>                      
                            <div id="date-container" class="input-field col s3">
                                <?php if (isset($inputs["date"])): ?>              
                                <input id="date" type="date" name="date"  value="<?= $inputs["date"]; ?>" required>
                                <?php else: ?>
                                <input id="date" type="date" name="date" value="<?php echo date("Y-m-d"); ?>" required>
                                <?php endif; ?>                                
                                <label for="date">Fecha</label>
                            </div> 

                                           
                        </div>

                        <div class="row">
                                <div id="reason-container" class="input-field col s5">
                                    <?php if (isset($inputs["reason"])): ?>              
                                    <input id="reason" type="text" name="reason"  value="<?= $inputs["reason"]; ?>" required>
                                    <?php else: ?>
                                    <input id="reason" type="text" name="reason"   required>
                                    <?php endif; ?>                                                                 
                                    <label for="reason">Motivo</label>
                                </div>
                                <div id="bank-container" class="input-field col s5">    
                                    <select>
                                        <option <?php if(date("F") == "January"){ ?> selected<?php } ?>> Enero <?php if(date("F") == "January"){ ?> Mes actual<?php } ?> </option>
                                        <option <?php if(date("F") == "February "){ ?> selected<?php } ?>> Febrero <?php if(date("F") == "February"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "March"){ ?> selected<?php } ?>> Marzo <?php if(date("F") == "March"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "April"){ ?> selected<?php } ?>> Abril <?php if(date("F") == "April"){ ?> (Mes actual)<?php } ?></option>
                                        <option <?php if(date("F") == "May"){ ?> selected<?php } ?>> Mayo <?php if(date("F") == "May"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "June"){ ?> selected<?php } ?>> Junio <?php if(date("F") == "June"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "July"){ ?> selected<?php } ?>> Julio <?php if(date("F") == "July"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "August"){ ?> selected<?php } ?>> Agosto <?php if(date("F") == "August"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "September"){ ?> selected<?php } ?>> Septiembre <?php if(date("F") == "September"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "October"){ ?> selected<?php } ?>> Octubre <?php if(date("F") == "October"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "November"){ ?> selected<?php } ?>> Noviembre <?php if(date("F") == "November"){ ?> Mes actual<?php } ?></option>
                                        <option <?php if(date("F") == "December"){ ?> selected<?php } ?>> Diciembre <?php if(date("F") == "December"){ ?> Mes actual<?php } ?></option>
                                    </select>
                                    <label>Mes de primera cuota</label>
                                </div>
                                
                            </div>

                            

                            <input type="hidden" name="bankId" value="<?php echo $bankId; ?>"  >
                            <input type="hidden" name="bankName" value="<?php echo $bankName; ?>">
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
