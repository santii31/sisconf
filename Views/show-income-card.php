<!-- Main content  -->
<div class="col s12 m8 l10">
            <div class="main-content">
                <div class="row">
                    
                        <div class="subtitle">
                            <i class="material-icons left">check</i>
                            <h2>
                                <?= $title ?>
                            </h2>
                        </div>
                        <div class="divider mb-divider"></div>



                        <div class="buttons">
                        
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <?php if($bankName != null){ ?><th> Banco </th><?php } ?>
                                    <th>Monto</th>
                                    <?php if($payment_method == "cash"){ ?>
                                    <th>Motivo</th>
                                    <?php }else if($payment_method == "bank_deposit" || $payment_method == "check"){ ?>
                                    <th>Aportante</th>
                                    <?php } ?>
                                    <th>Fecha</th>
                                    <th>Metodo de pago</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr> 
                                <?php if($bankName != null){ ?><td><?php echo $bankName; ?></td><?php } ?>
                                    <td><?php if($currency == "dolar"){echo "US$ " . $amount; }else{echo "AR$ " . $amount; } ?> </td>
                                    <td><?php echo $reason; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php if($payment_method == "cash"){echo "Efectivo"; }else if($payment_method == "bank_deposit"){echo "Deposito bancario"; }else if($payment_method == "check"){echo "Cheque"; } ?></td>
                                    <td><a class="btn-floating btn-small waves-effect waves-light dark-blue"><i class="material-icons left">edit</i></a>&nbsp;&nbsp;&nbsp;<a class="btn-floating btn-small waves-effect waves-light dark-blue"><i class="material-icons left">delete</i></a></a><td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <br><br><br>
                            
                                
                            <ul class="collapsible">
                                <li>
                                <div class="collapsible-header"><i class="material-icons">add</i>Registrar otro ingreso</div>
                                <div class="collapsible-body"><a href="http://localhost/javaScript/income/addCashIncomePath" class="othera"><i class="material-icons left">monetization_on</i>Efectivo</a></div>
                                <div class="collapsible-body"><a href="http://localhost/javaScript/bank/selectCreditCardPath/1" class="othera"><i class="material-icons left">supervisor_account</i>Deposito</a></div>
                                <div class="collapsible-body"><a href="http://localhost/javaScript/check/addCheckIncomePath" class="othera"><i class="material-icons left">work</i>Cheque</a></div>
                            </li>

                                
                            </ul>

                </div>
            </div>
        </div>
    </div>
</div>  
