<?php

    namespace Config;
    
    define("ROOT", dirname(__DIR__) . "/");
	define("FRONT_ROOT", "http://localhost/sisconf/");
    define("VIEWS_PATH", "Views/");
	define("CSS_PATH", FRONT_ROOT . VIEWS_PATH . "assets/css/");
	define("JS_PATH", FRONT_ROOT . VIEWS_PATH . "assets/js/");	
	define("IMG_PATH", FRONT_ROOT . VIEWS_PATH . "assets/img/");	
	define("MAX_ITEMS_PAGE", 6);
	
	
	//DB
	define("DB_HOST", "localhost");
	define("DB_NAME", "sisco");		
	define("DB_USER", "root");
	define("DB_PASS", "");

	//ERR MSGS
	define("DB_ERROR", "Un error ha ocurrido. Intente mas tarde!");	

	define("LOGIN_NEEDED", "Inicie sesión para continuar.");
	define("LOGIN_ERROR", "El email ingresado o la contraseña son incorrectos.");	
	define("REGISTER_ERROR", "El email ingresado ya se encuentra registrado.");
	define("EMPTY_FIELDS", "Complete los campos correctamente para continuar.");
	
	define("DNI_ERROR", "El DNI ingresado ya se encuentra registrado.");
	
	
	define("CREDIT_ADDED", "Egreso con credito añadido con éxito.");

	define("INCOME_ADDED", "Ingreso añadido con éxito.");
	define("OUTFLOW_ADDED", "Egreso añadido con éxito.");
		
	define("BANK_ADDED", "Añadido con éxito.");
	define("BANK_ERROR", "Algun banco de los seleccionados no pudo ser cargado con exito. Vuelva a intentarlo.");	

	define("CONFIG_UPDATE", "Configuracion actualizada con éxito.");


?>
