<body class="dashboard">
    <!-- Navbar -->     

    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">Mi cuenta</a></li>
        <li class="divider"></li>
        <li><a href="#!">Desconectarme</a></li>
    </ul>

    <div class="navbar-fixed">
        <ul id="dropdown1" class="dropdown-content">
            <li>
                <a href="<?= FRONT_ROOT ?>admin/logout">Desconectarse</a>
            </li>
        </ul>        
        <nav>
            <div class="nav-wrapper">
                <!-- Hamburg menu icon -->
                
                <a href="<?= FRONT_ROOT ?>admin/dashboard">
                    <img src="<?= IMG_PATH ?>logo2.png" alt="Logo" class="logo-brand3">
                </a>
                <ul  class="right hide-on-med-and-down">                    
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown1"><?php echo $user->getUserName(); ?><i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>             
        
    <!-- Links mobile/table -->
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background"></div>                                
                <a href="#email">
                    <span class="white-text email">                          
                        <?= $user->getUserName(); ?>
                    </span>
                </a>
            </div>
        </li>
        <li>
            <a href="<?= FRONT_ROOT ?>user/logout"><i class="material-icons">keyboard_backspace</i>Desconectarse</a>
        </li>        
        <li>
            <div class="divider"></div>
        </li>                
        <ul>

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">beach_access</i>Carpas</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?= FRONT_ROOT ?>beachTent/showMap" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">map</i>
                                    Ver mapa de reservas
                                </a>
                            </li>   
                            <li>
                                <a href="<?= FRONT_ROOT ?>reservation/listReservationPath" class="valign-wrapper waves-effect">
                                <i class="material-icons left">format_list_numbered</i>
                                    Listar reservas
                                </a>
                            </li>   
                            <li>
                                <a href="<?= FRONT_ROOT ?>beachTent/stock" class="valign-wrapper waves-effect">
                                <i class="material-icons left">assignment</i>
                                    Stock de carpas
                                </a>
                            </li>   
                            <li>
                                <a href="<?= FRONT_ROOT ?>reservation/listReservationParasolPath" class="valign-wrapper waves-effect">
                                <i class="material-icons left">format_list_numbered</i>
                                    Listar reservas de sombrillas
                                </a>
                            </li>                                      
                        </ul>
                    </div>
                </li>                    
            </ul>  

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">directions_car</i>Estacionamiento</div>
                    <div class="collapsible-body">
                        <ul>                                           
                            <li>
                                <a href="<?= FRONT_ROOT ?>parking/parkingMap" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">map</i>
                                    Ver mapa de reservas
                                </a>
                            </li>                                                                              
                        </ul>
                    </div>
                </li>                    
            </ul>                                                      

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons left">attach_money</i>Contabilidad</div>
                    <div class="collapsible-body">
                        <ul>    
                            <li>
                                <a href="<?= FRONT_ROOT ?>balance/totalBalance" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">assignment_ind</i>
                                    Balance de saldos
                                </a>
                            </li>  
                            <li>
                                <a href="<?= FRONT_ROOT ?>accounting/diaryPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">chrome_reader_mode</i>
                                    Caja diaria
                                </a>
                            </li>                                         
                            <li>
                                <a href="<?= FRONT_ROOT ?>accounting/salesDailyPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">date_range</i>
                                    Ventas diarias
                                </a>
                            </li>         
                            <li>
                                <a href="<?= FRONT_ROOT ?>accounting/salesMonthlyPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">description</i>
                                    Ventas mensuales
                                </a>
                            </li>    
                            <li>
                                <a href="<?= FRONT_ROOT ?>accounting/salesByAdminsPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">folder_shared</i>
                                    Ventas por administradores
                                </a>
                            </li>                                                                                                                                                    
                                <li>
                                <a href="<?= FRONT_ROOT ?>accounting/salesByDatesPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">search</i>
                                    Filtrar por fechas
                                </a>
                            </li>         

                            <li>
                                <a href="<?= FRONT_ROOT ?>accounting/staffSalaryPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">account_circle</i>
                                    Sueldo del personal
                                </a>
                            </li>    
                            
                            <li>
                                <a href="<?= FRONT_ROOT ?>reservation/checkList" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">contacts</i>
                                    Buscar cheques
                                </a>
                            </li>                                                            
                        </ul>
                    </div>
                </li>                    
            </ul> 

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">insert_chart</i>Stock</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?= FRONT_ROOT ?>product/addProductPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">add_circle_outline</i>
                                    Añadir producto
                                </a>
                            </li>
                            <li>            
                                <a href="<?= FRONT_ROOT ?>product/searchPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">search</i>
                                    Buscar productos
                                </a>
                            </li> 
                            <li>
                                <a href="<?= FRONT_ROOT ?>stock/listStockPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">format_list_numbered</i>
                                    Listar/Modificar stock
                                </a>
                            </li>                                
                        </ul>
                    </div>
                </li>                    
            </ul>                    

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">content_paste</i>Proveedores</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?= FRONT_ROOT ?>provider/addProviderPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">person_add</i>
                                    Añadir proveedor
                                </a>
                            </li>
                            <li>            
                                <a href="<?= FRONT_ROOT ?>provider/searchPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">search</i>
                                    Buscar proveedores
                                </a>
                            </li> 
                            <li>
                                <a href="<?= FRONT_ROOT ?>provider/listProviderPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">format_list_numbered</i>
                                    Listar/Modificar proveedores
                                </a>
                            </li>                                
                        </ul>
                    </div>
                </li>                    
            </ul>

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">person_pin_circle</i>Clientes</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>            
                                <a href="<?= FRONT_ROOT ?>client/searchPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">search</i>
                                    Buscar clientes
                                </a>
                            </li> 
                            <li>
                                <a href="<?= FRONT_ROOT ?>client/listClientPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">format_list_numbered</i>
                                    Listar clientes
                                </a>
                            </li>                                                                     
                        </ul>
                    </div>
                </li>                    
            </ul> 

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">directions_walk</i>Clientes Potenciales</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?= FRONT_ROOT ?>clientPotential/addPotentialClientPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">person_add</i>
                                    Añadir cliente potencial
                                </a>
                            </li>
                            <li>            
                                <a href="<?= FRONT_ROOT ?>clientPotential/searchPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">search</i>
                                    Buscar clientes potenciales
                                </a>
                            </li> 
                            <li>
                                <a href="<?= FRONT_ROOT ?>clientPotential/listPotentialClientPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">format_list_numbered</i>
                                    Listar clientes potenciales
                                </a>
                            </li>                                                                     
                        </ul>
                    </div>
                </li>                    
            </ul>  

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">group</i>Personal</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?= FRONT_ROOT ?>staff/addStaffPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">person_add</i>
                                    Añadir personal
                                </a>
                            </li>
                            <li>            
                                <a href="<?= FRONT_ROOT ?>staff/searchPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">search</i>
                                    Buscar personal
                                </a>
                            </li> 
                            <li>
                                <a href="<?= FRONT_ROOT ?>staff/listStaffPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">format_list_numbered</i>
                                    Listar/Modificar personal
                                </a>
                            </li>                                
                        </ul>
                    </div>
                </li>                    
            </ul>                     

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">email</i>Correo</div>
                    <div class="collapsible-body">
                        <ul>                                
                            <li>
                                <a href="<?= FRONT_ROOT ?>email/sendEmailPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">send</i>
                                    Enviar nuevo correo
                                </a>
                            </li> 
                        </ul>
                    </div>
                </li>                    
            </ul>                     

            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">person_pin</i>Administradores</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?= FRONT_ROOT ?>admin/addAdminPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">person_add</i>
                                    Añadir administrador
                                </a>
                            </li>
                            <li>
                                <a href="<?= FRONT_ROOT ?>admin/listAdminPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">format_list_numbered</i>
                                    Listar/Modificar administradores
                                </a>
                            </li>                                
                        </ul>
                    </div>
                </li>                    
            </ul>       
            
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">settings</i>Configuracion</div>
                    <div class="collapsible-body">
                        <ul>
                            <li>
                                <a href="<?= FRONT_ROOT ?>config/updateValuesPath" class="valign-wrapper waves-effect">
                                    <i class="material-icons left">subdirectory_arrow_right</i>
                                    Actualizar valores
                                </a>
                            </li>                                                                  
                        </ul>
                    </div>
                </li>                    
            </ul>                          

        </ul>  
    </ul>
            	
    <div class="row">
        <!-- Links desktop -->
        <div class="col s12 m4 l2 menu-container hide-on-med-and-down">
            <div class="sidenav-container">
                <ul>

                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">poll</i>Mi balance</div>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">trending_up</i>
                                            Ganancias
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="#" class="valign-wrapper waves-effect">
                                        <i class="material-icons left">trending_down</i>
                                            Perdidas
                                        </a>
                                    </li>   
                                                                         
                                </ul>
                            </div>
                        </li>                    
                    </ul>  

                    <ul class="collapsible">
                        <li>
                        <div class="collapsible-header"><i class="material-icons">add</i>Registrar ingreso</div>
                        <div class="collapsible-body">
                        <ul>
                                    <li>
                                        <a href="http://localhost/javaScript/income/addCashIncomePath" class="valign-wrapper waves-effect">
                                        <i class="material-icons left">monetization_on</i>
                                            Efectivo
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="http://localhost/javaScript/bank/selectCreditCardPath/1" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">supervisor_account</i>
                                            Deposito
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="http://localhost/javaScript/check/addCheckIncomePath" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">work</i>
                                            Cheque
                                        </a>
                                    </li>   
                                    
                                                                         
                                </ul>
                        </li>                    
                    </ul>   

                    <ul class="collapsible">
                        <li>
                        <div class="collapsible-header"><i class="material-icons">remove</i>Registrar egreso</div>
                        <div class="collapsible-body">
                        <ul>
                                    <li>
                                        <a href="http://localhost/javaScript/outflow/addCashOutflowPath" class="valign-wrapper waves-effect">
                                        <i class="material-icons left">monetization_on</i>
                                            Efectivo
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="http://localhost/javaScript/bank/selectCreditCardPath/2" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">payment</i>
                                            Credito
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="http://localhost/javaScript/bank/selectCreditCardPath/3" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">local_atm</i>
                                            Debito
                                        </a>
                                    </li>   
                                    <li>
                                        <a href="http://localhost/javaScript/income/addCheckIncomePath" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">work</i>
                                            Cheque
                                        </a>
                                    </li>   
                                                                         
                                </ul>
                        </li>                    
                    </ul>                                                   

                    

                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">account_balance</i>Mi banco</div>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">credit_card</i>
                                            Compras con credito
                                        </a>
                                    </li>
                                    <li>            
                                        <a href="http://localhost/javaScript/bank/showLinksPath" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">home</i>
                                            Home banking
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="#" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">phone</i>
                                            Contactos
                                        </a>
                                    </li>                                
                                </ul>
                            </div>
                        </li>                    
                    </ul>                    

                    
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><i class="material-icons">settings</i>Configuracion</div>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="valign-wrapper waves-effect">
                                            <i class="material-icons left">subdirectory_arrow_right</i>
                                            Actualizar valores
                                        </a>
                                    </li>                                                                  
                                </ul>
                            </div>
                        </li>                    
                    </ul>                          

                </ul>                
            </div>
        </div>