<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content">
                <div class="row">
                    

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
                        
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Link de Home Banking</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($banks as $bank): ?>
                            <tr>
                                <td> <?= ucfirst( $bank->getName() ); ?> </td>
                                <td> <a href="<?=  $bank->getHomeBankingLink() ; ?>" class="othera"> link </a> </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                                                 
                        </div>
                                          
                        
                </div>
            </div>
        </div>
    </div>
</div>  

