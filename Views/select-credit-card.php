<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content">
                <div class="row">
                    <div class="col s10 form-test">

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

                        <label>Seleccione a continuación, dentro del listado con los bancos relacionados a su cuenta, el nombre del banco en el cual le hayan efectuado el deposito. <br>Si el banco no aparece en el listado pulse <a id="add-bank" class="waves-effect waves-light othera modal-trigger" href="#modal1">aqui</a> para agregarlo a su cuenta.</label>
                        
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4>Agregar banco a mi cuenta</h4>
                                <br>
                                <form action="<?= FRONT_ROOT ?>bank/register" method="post" class="col s10 form-test">
                                <select multiple name="banks[]">
                                
                                <option value="" disabled >Seleccione banco</option>
                                <?php foreach($banks as $bank){  ?>
                                <option value="<?php echo $bank->getId(); ?>"><?php echo  $bank->getName(); ?></option>
                                <?php } ?>
                                </select>
                                <label>Bancos</label>
                                    <br><br>

                                    <input type="hidden" name="userId" value="<?php echo $userId ?>">
                                    <input type="hidden" name="userName" value="<?php echo $userName ?>">
                                    <input type="hidden" name="password" value="<?php echo $password ?>">
                                    
                                    <input type="hidden" name="aux" value="<?php echo $aux ?>">

                                    <div class="row">
                                        <div class="col s12 center-align">
                                            <button class="btn waves-effect waves-light" type="submit" name="action">Añadir
                                                <i class="material-icons right">chevron_right</i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                            </div>
                        </div>

                        <br><br><br>
                        <?php if($aux == "1"){ ?>
                            <form action="<?= FRONT_ROOT ?>income/addBankDeposithPath" method="post" >
                        <?php }else if($aux == "2"){  ?>
                            <form action="<?= FRONT_ROOT ?>buyCredit/addCreditOutflowPath" method="post" >
                        <?php }else if($aux == "3"){  ?>
                            <form action="<?= FRONT_ROOT ?>outflow/addDebitOutflowPath" method="post" >
                        <?php } ?>

                        <div class="input-field col s12">
                            <select name="bank">
                                <option value="" disabled selected>Seleccione aqui</option>
                                <?php foreach($userBanks as $bank){ ?>
                                <option value="<?php echo $bank->getId(); ?>"><?php echo $bank->getName(); ?></option>
                                <?php } ?>
                            </select>
                            <label>Banco</label>
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
</div>  