DROP DATABASE sisco;

CREATE DATABASE sisco;

USE sisco;

-----------------USER-----------------

CREATE TABLE user (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(30) NOT NULL, 
    `lastname` VARCHAR(25) NOT NULL,
    `userName` VARCHAR(20) NOT NULL UNIQUE,
    `password` VARCHAR(70) NOT NULL,
    `is_active` BOOLEAN NOT NULL DEFAULT TRUE,

    `date_register` DATE NOT NULL,
    `date_disable` DATE DEFAULT NULL,    
    `date_enable` DATE DEFAULT NULL,
    `date_update` DATE DEFAULT NULL
);

DROP procedure IF EXISTS `user_add`;
DELIMITER $$
CREATE PROCEDURE user_add (
                                IN name VARCHAR(30),
                                IN lastname VARCHAR(25),
                                IN userName VARCHAR(20),
                                IN password VARCHAR(70),
                                IN date_register DATE,
                                OUT lastId int
                            )
BEGIN
	INSERT INTO user (
			user.name,
			user.lastname,
			user.userName,
			user.password,
            user.date_register
	)
    VALUES
        (name, lastname, userName, password, date_register);
        SET lastId = LAST_INSERT_ID();	
	    SELECT lastId;
END$$


DROP procedure IF EXISTS `user_getById`;
DELIMITER $$
CREATE PROCEDURE user_getById (IN id INT)
BEGIN
	SELECT * FROM `user` WHERE `user`.`id` = id;
END$$

DROP procedure IF EXISTS `user_getByUserName`;
DELIMITER $$
CREATE PROCEDURE user_getByUserName (IN user_name VARCHAR(20))
BEGIN
	SELECT * FROM `user` WHERE `user`.`userName` = user_name;
END$$

DROP procedure IF EXISTS `user_getAll`;
DELIMITER $$
CREATE PROCEDURE user_getAll ()
BEGIN
	SELECT * FROM `user` ORDER BY name ASC;
END$$

----------------BANK--------------------

CREATE TABLE bank (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `homeBankingLink` VARCHAR(255) NOT NULL UNIQUE,
	`name` VARCHAR(40) NOT NULL UNIQUE

);

INSERT INTO `bank` (`name` , `homeBankingLink`) VALUES  ('BANCO DE LA NACION ARGENTINA' , 'https://www.bna.com.ar/Personas/HomeBanking') , ('BANCO DE LA PROVINCIA DE BUENOS AIRES' , 'https://www.bancoprovincia.com.ar/principal/bippersonal') , ('INDUSTRIAL & COMMERCIAL BANK OF CHINA' , 'https://www.icbc.com.ar/personas') , ('CITIBANK N.A.' , 'https://www.citibank.com/icg/sa/latam/argentina/ebanking-solutions/') , ('BANCO BBVA ARGENTINA S.A.' , 'https://www.bbva.com.ar/') , ('BANCO DE LA PROVINCIA DE CORDOBA S.A.' , 'https://www.bancor.com.ar/bancon/') , ('BANCO SUPERVIELLE S.A.' , 'https://personas.supervielle.com.ar/Login.aspx') , ('BANCO DE LA CIUDAD DE BUENOS AIRES' , 'https://hb.redlink.com.ar/ciudad/login.htm') , ('BANCO PATAGONIA S.A.' , 'https://ebankpersonas.bancopatagonia.com.ar/eBanking/usuarios/login.htm') , ('BANCO HIPOTECARIO S.A.' , 'https://hb.hipotecario.com.ar/hb/#/') , ('BANCO DE SAN JUAN S.A.' , 'https://hb.redlink.com.ar/bsj/login.htm') , ('BANCO MUNICIPAL DE ROSARIO' , 'https://hb.redlink.com.ar/bmros/login.htm') , ('BANCO SANTANDER RIO S.A.' , 'https://www2.personas.santander.com.ar/obp-webapp/angular/#!/login') , ('BANCO DEL CHUBUT S.A.' , 'https://hb.redlink.com.ar/bancochubut/login.htm') , ('BANCO DE SANTA CRUZ S.A.' , 'https://hb.redlink.com.ar/bancosantacruz/login.htm') , ('BANCO DE LA PAMPA SOCIEDAD DE ECONOMÍA MIXTA' , 'https://hb.redlink.com.ar/bancodelapampa/login.htm') , ('BANCO DE CORRIENTES S.A.' , 'https://www.bancodecorrientes.com.ar/sitio/seccion.php?id=8&tokenp013e2fbbb6b70f3efb9afe663be8c505') , ('BANCO PROVINCIA DEL NEUQUÉN S.A.' , 'https://hb.redlink.com.ar/bpn/login.htm') , ('HSBC BANK ARGENTINA S.A.' , 'https://www.security.online-banking.hsbc.com.ar/gsa/SECURITY_LOGON_PAGE/') , ('BANCO CREDICOOP COOPERATIVO LIMITADO' , 'https://bancainternet.bancocredicoop.coop/bcclbi/') , ('BANCO PROVINCIA DE TIERRA DEL FUEGO' , 'https://hb.redlink.com.ar/btf/login.htm') , ('BANCO MACRO S.A.' , 'https://www.macro.com.ar/bancainternet/#') , ('BANCO COMAFI S.A.' , 'https://hb.comafi.com.ar/homebank/HBI.do') , ('BANCO RIOJA SOCIEDAD ANONIMA UNIPERSONAL' , 'https://hb.redlink.com.ar/nblr/login.htm') , ('NUEVO BANCO DEL CHACO S.A.' , 'https://www.nbch.com.ar/Personas/Banca-Electronica/Home-Banking/Caracteristicas') , ('BANCO DE FORMOSA S.A.' , 'https://hb.redlink.com.ar/bancodeformosa/login.htm') , ('BANCO DE SANTIAGO DEL ESTERO S.A.' , 'https://hb.redlink.com.ar/bse/login.htm') , ('NUEVO BANCO DE SANTA FE S.A.' , 'https://hb.redlink.com.ar/bancobsf/login.htm') , ('NUEVO BANCO DE ENTRE RÍOS S.A.' , 'https://hb.redlink.com.ar/bancoentrerios/login.htm');

DROP procedure IF EXISTS `bank_getAll`;
DELIMITER $$
CREATE PROCEDURE bank_getAll ()
BEGIN
	SELECT * FROM `bank` ORDER BY name ASC;
END$$

DROP procedure IF EXISTS `bank_getById`;
DELIMITER $$
CREATE PROCEDURE bank_getById (IN id INT)
BEGIN
	SELECT * FROM `bank` WHERE `bank`.`id` = id;
END$$
------------------USERXBANK---------------------

CREATE TABLE userxbank (
    `FK_id_user` INT NOT NULL,
    `FK_id_bank` INT NOT NULL,
	CONSTRAINT `FK_id_user_userxbank` FOREIGN KEY (`FK_id_user`) REFERENCES `user` (`id`),
    CONSTRAINT `FK_id_bank_userxbank` FOREIGN KEY (`FK_id_bank`) REFERENCES `bank` (`id`)

);

DROP procedure IF EXISTS `userxbank_add`;
DELIMITER $$
CREATE PROCEDURE userxbank_add (
                                            IN FK_id_user INT,                                
                                            IN FK_id_bank INT
                                        )
BEGIN
	INSERT INTO userxbank (
			userxbank.FK_id_user,
            userxbank.FK_id_bank                   
	)
    VALUES
        (FK_id_user, FK_id_bank);
END$$

DROP procedure IF EXISTS `userxbank_getUserBybank`;					    
DELIMITER $$
CREATE PROCEDURE userxbank_getuserBybank (IN id_bank INT)
 BEGIN
	SELECT  user.id AS user_id,
            user.name AS user_name,
            user.lastname AS user_lastname,
            user.userName AS user_username,
            user.password AS user_password
	FROM userxbank
	INNER JOIN user ON userxbank.FK_id_user = user.id
	WHERE (userxbank.FK_id_bank = id_bank)
	GROUP BY user.id;
END$$

DROP procedure IF EXISTS `userxbank_getBankByUser`;					    
DELIMITER $$
CREATE PROCEDURE userxbank_getBankByUser (IN id INT)
BEGIN
	SELECT  bank.id AS bank_id,
            bank.name AS bank_name,
            bank.homeBankingLink AS bank_homeBankingLink
	FROM userxbank
	INNER JOIN bank ON userxbank.FK_id_bank = bank.id
	WHERE (userxbank.FK_id_user = id)
	GROUP BY bank.id;
END$$



DROP procedure IF EXISTS `userxbank_getAll`;
DELIMITER $$
CREATE PROCEDURE userxbank_getAll ()
BEGIN
	SELECT *
    FROM `userxbank`;
END$$


------------------INCOME------------------------

CREATE TABLE income (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `amount` INT NOT NULL,
	`currency` VARCHAR(5) NOT NULL ,
    `date` DATE NOT NULL,
    `reason` VARCHAR(30) NOT NULL,
    `payment_method` VARCHAR(11) NOT NULL ,
    `id_bank` INT DEFAULT NULL,
    `id_check` INT DEFAULT NULL,
    `FK_id_user` INT NOT NULL,
    CONSTRAINT `FK_id_user_income` FOREIGN KEY (`FK_id_user`) REFERENCES `user` (`id`)
);

DROP procedure IF EXISTS `income_add`;
DELIMITER $$
CREATE PROCEDURE income_add (
                                IN amount INT,
                                IN currency VARCHAR(5),
                                IN date DATE,
                                IN reason VARCHAR(30),
                                IN payment_method VARCHAR (11),
                                IN FK_id_user INT, 
                                OUT lastId INT
                            )
BEGIN
	INSERT INTO income (
			income.amount,
			income.currency,
			income.date,
			income.reason,
            income.payment_method,
            income.FK_id_user
	)
    VALUES
        (amount, currency, date, reason, payment_method, FK_id_user);
        SET lastId = LAST_INSERT_ID();	
	    SELECT lastId;
END$$

DROP procedure IF EXISTS `income_addBank`;
DELIMITER $$
CREATE PROCEDURE income_addBank (
                                    IN id INT, 
                                    IN id_bank INT
                                )
BEGIN
    UPDATE `income` 
    SET         
        `income`.`id_bank` = id_bank  
    WHERE 
        `income`.`id` = id;	
END$$

DROP procedure IF EXISTS `income_addCheck`;
DELIMITER $$
CREATE PROCEDURE income_addCheck (
                                    IN id INT, 
                                    IN id_check INT
                                )
BEGIN
    UPDATE `income` 
    SET         
        `income`.`id_check` = id_check   
    WHERE 
        `income`.`id` = id;	
END$$

DROP procedure IF EXISTS `income_getAll`;
DELIMITER $$
CREATE PROCEDURE income_getAll ()
BEGIN
	SELECT * FROM `income` ORDER BY name ASC;
END$$

DROP procedure IF EXISTS `income_getById`;
DELIMITER $$
CREATE PROCEDURE income_getById (IN id INT)
BEGIN
	SELECT * FROM `income` WHERE `income`.`id` = id;
END$$

DROP procedure IF EXISTS `income_getByUserId`;
DELIMITER $$
CREATE PROCEDURE income_getByUserId (IN id INT)
BEGIN
    SELECT        
        income.id AS income_id,
        income.amount AS income_amount,
        income.currency AS income_currency,
        income.date AS income_date,
        income.reason AS income_reason,
        income.payment_method AS income_payment_method,
        income.FK_id_user AS income_FK_id_user     
    FROM income             
    WHERE income.FK_id_user = id;    
END$$

---------------CHECK-----------------


CREATE TABLE check (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `date_of_issue` DATE NOT NULL,
    `expiration_date` DATE NOT NULL,
	`currency` VARCHAR(5) NOT NULL ,
    `amount` INT NOT NULL,
    `contributor` VARCHAR(30) NOT NULL,
    `FK_id_user` INT NOT NULL,
    `FK_id_bank` INT NOT NULL,
    CONSTRAINT `FK_id_user_check` FOREIGN KEY (`FK_id_user`) REFERENCES `user` (`id`),
    CONSTRAINT `FK_id_bank_check` FOREIGN KEY (`FK_id_bank`) REFERENCES `bank` (`id`)
);

DROP procedure IF EXISTS `check_add`;
DELIMITER $$
CREATE PROCEDURE `check_add` (
                                IN date_of_issue DATE,
                                IN expiration_date DATE,
                                IN currency VARCHAR(5),
                                IN amount INT,
                                IN contributor VARCHAR(30),
                                IN FK_id_user INT,
                                IN FK_id_bank INT,
                                OUT lastId INT
                            )
BEGIN
	INSERT INTO `check` (
			`check`.date_of_issue,
			`check`.expiration_date,
			`check`.currency,
			`check`.amount,
            `check`.contributor,
            `check`.FK_id_user,
            `check`.FK_id_bank
	)
    VALUES
        (date_of_issue, expiration_date, currency, amount, contributor, FK_id_user, FK_id_bank);
        SET lastId = LAST_INSERT_ID();	
	    SELECT lastId;
END$$


DROP procedure IF EXISTS `check_getByUserId`;
DELIMITER $$
CREATE PROCEDURE `check_getByUserId` (IN id INT)
BEGIN
    SELECT        
        `check`.id AS check_id,
        `check`.date_of_issue AS check_date_of_issue,
        `check`.expiration_date AS check_expiration_date,
        `check`.currency AS check_currency,
        `check`.amount AS check_amount,
        `check`.contributor AS check_contributor,
        `check`.FK_id_user AS check_FK_id_user,
        `check`.FK_id_bank AS check_FK_id_bank     
    FROM `check`             
    WHERE `check`.FK_id_user = id;    
END$$


--------------------OUTFLOW-------------------


CREATE TABLE outflow (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `amount` INT NOT NULL,
	`currency` VARCHAR(5) NOT NULL ,
    `date` DATE NOT NULL,
    `reason` VARCHAR(30) NOT NULL,
    `payment_method` VARCHAR(11) NOT NULL ,
    `id_bank` INT DEFAULT NULL,
    `id_check` INT DEFAULT NULL,
    `FK_id_user` INT NOT NULL,
    CONSTRAINT `FK_id_user_outflow` FOREIGN KEY (`FK_id_user`) REFERENCES `user` (`id`)
);

DROP procedure IF EXISTS `outflow_add`;
DELIMITER $$
CREATE PROCEDURE outflow_add (
                                IN amount INT,
                                IN currency VARCHAR(5),
                                IN date DATE,
                                IN reason VARCHAR(30),
                                IN payment_method VARCHAR (11),
                                IN FK_id_user INT,
                                OUT lastId INT
                            )
BEGIN
	INSERT INTO outflow (
			outflow.amount,
			outflow.currency,
			outflow.date,
			outflow.reason,
            outflow.payment_method,
            outflow.FK_id_user
	)
    VALUES
        (amount, currency, date, reason, payment_method, FK_id_user);
        SET lastId = LAST_INSERT_ID();	
	    SELECT lastId;
END$$

DROP procedure IF EXISTS `outflow_addBank`;
DELIMITER $$
CREATE PROCEDURE outflow_addBank (
                                    IN id INT, 
                                    IN id_bank INT
                                )
BEGIN
    UPDATE `outflow` 
    SET         
        `outflow`.`id_bank` = id_bank  
    WHERE 
        `outflow`.`id` = id;	
END$$

DROP procedure IF EXISTS `outflow_addCheck`;
DELIMITER $$
CREATE PROCEDURE outflow_addCheck (
                                    IN id INT, 
                                    IN id_check INT
                                )
BEGIN
    UPDATE `outflow` 
    SET         
        `outflow`.`id_check` = id_check   
    WHERE 
        `outflow`.`id` = id;	
END$$

DROP procedure IF EXISTS `outflow_update`;
DELIMITER $$
CREATE PROCEDURE outflow_update (
                                    IN amount INT,
                                    IN currency VARCHAR(5),
                                    IN date DATE,
                                    IN reason VARCHAR(30),
                                    IN id_bank INT,
                                    IN id_check INT, 
                                    IN id INT
                                )
BEGIN
    UPDATE `outflow` 
    SET 
        `outflow`.`amount` = amount, 
        `outflow`.`currency` = currency,
        `outflow`.`date` = date,
        `outflow`.`reason` = reason,        
        `outflow`.`id_bank` = id_bank,
        `outflow`.`id_check` = id_check    
    WHERE 
        `outflow`.`id` = id;	
END$$

DROP procedure IF EXISTS `outflow_getAll`;
DELIMITER $$
CREATE PROCEDURE outflow_getAll ()
BEGIN
	SELECT * FROM `outflow` ORDER BY name ASC;
END$$

DROP procedure IF EXISTS `outflow_getById`;
DELIMITER $$
CREATE PROCEDURE outflow_getById (IN id INT)
BEGIN
	SELECT * FROM `outflow` WHERE `outflow`.`id` = id;
END$$

DROP procedure IF EXISTS `outflow_getByUserId`;
DELIMITER $$
CREATE PROCEDURE outflow_getByUserId (IN id INT)
BEGIN
    SELECT        
        outflow.id AS outflow_id,
        outflow.amount AS outflow_amount,
        outflow.currency AS outflow_currency,
        outflow.date AS outflow_date,
        outflow.reason AS outflow_reason,
        outflow.payment_method AS outflow_payment_method,
        outflow.FK_id_user AS outflow_FK_id_user     
    FROM outflow             
    WHERE outflow.FK_id_user = id;    
END$$


-----------------------BUY CREDIT--------------------

    CREATE TABLE buy_credit (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`currency` VARCHAR(5) NOT NULL ,
    `amount` INT NOT NULL,
    `fees` INT NOT NULL,
    `remaining_fees` INT NOT NULL,
    `monthly_fee` DATE NOT NULL, 
    `date` DATE NOT NULL,
    `reason` VARCHAR(30) NOT NULL,
    `FK_id_bank` INT NOT NULL,
    `FK_id_user` INT NOT NULL,
    CONSTRAINT `FK_id_bank_buy_credit` FOREIGN KEY (`FK_id_bank`) REFERENCES `bank` (`id`),
    CONSTRAINT `FK_id_user_buy_credit` FOREIGN KEY (`FK_id_user`) REFERENCES `user` (`id`)
);

DROP procedure IF EXISTS `buy_credit_add`;
DELIMITER $$
CREATE PROCEDURE buy_credit_add (
                                IN currency VARCHAR(5),
                                IN amount INT,
                                IN fees INT,
                                IN remaining_fees INT,
                                IN monthly_fee DATE,
                                IN date DATE,
                                IN reason VARCHAR(30),
                                IN FK_id_bank INT,
                                IN FK_id_user INT
                            )
BEGIN
	INSERT INTO buy_credit (
			buy_credit.currency,
			buy_credit.amount,
            buy_credit.fees,
            buy_credit.remaining_fees, 
            buy_credit.monthly_fee,
			buy_credit.date,
			buy_credit.reason,
            buy_credit.FK_id_bank,
            buy_credit.FK_id_user
	)
    VALUES
        (currency, amount, fees, remaining_fees, monthly_fee, date, reason, FK_id_bank, FK_id_user);
END$$