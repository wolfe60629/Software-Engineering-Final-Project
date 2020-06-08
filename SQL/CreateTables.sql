 CREATE TABLE USERS ( 
	[USER_ID]            INT          PRIMARY KEY   NOT NULL   IDENTITY(1,1)            ,
	[USERNAME]          VARCHAR(50)                 NOT NULL                            ,
	[PASSWORD_HASH]      BINARY(64)                 NOT NULL                            ,
	[LAST_LOGIN]         DATETIME                   NULL       DEFAULT(NULL)            ,
	[CREATION_DATE]      DATETIME                   NULL       DEFAULT(GETDATE())       ,
	[IS_ACTIVATED]       BIT                        NOT NULL   DEFAULT(1)               ,
	[IS_SUPERVISOR]      BIT                        NOT NULL   DEFAULT(0)               ,
	 
);

 CREATE TABLE VEHICLE (
	[VEHICLE_ID]         INT          PRIMARY KEY   NOT NULL   IDENTITY(1,1)            ,
	[MAKE]               VARCHAR(50)                NOT NULL                            ,
	[MODEL]              VARCHAR(50)                NOT NULL                            , 
	[YEAR]               INT                        NOT NULL                            ,
	[VIN]                VARCHAR(17)                NOT NULL
 );

   CREATE TABLE DEALER (
	[DEALER_ID]          INT          PRIMARY KEY   NOT NULL   IDENTITY(1,1)                      ,
	[DEALER_NAME]        VARCHAR(50)                NOT NULL                                      ,
	[ADDRESS1]           VARCHAR(100)               NOT NULL                                      ,
	[ADDRESS2]           VARCHAR(50)                NOT NULL                                      ,
	[CITY]               VARCHAR(20)                NOT NULL                                      ,
	[STATE]              VARCHAR(30)                NOT NULL                                      ,
	[ZIP]                INT                        NOT NULL                                     
 );

 CREATE TABLE ASSIGNMENTS (
	[ASSIGNMENT_ID]      INT          PRIMARY KEY   NOT NULL  IDENTITY(1,1)                    ,
	[USER_ID]            INT                        NOT NULL                                   ,
	[DEALER_ID]          INT                        NOT NULL                                   ,
	[ASSIGNMENTADDDATE]  DATETIME                   NOT NULL  DEFAULT(GETDATE())               , 

	CONSTRAINT  FK_ASSN_USER_ID FOREIGN KEY ([USER_ID])
		REFERENCES USERS([USER_ID])
			ON DELETE CASCADE
			ON UPDATE CASCADE,
	CONSTRAINT FK_ASSN_DEALER_ID FOREIGN KEY ([DEALER_ID])
		REFERENCES DEALER (DEALER_ID)
			ON DELETE CASCADE
			ON UPDATE CASCADE

);

  CREATE TABLE DEALER_INVENTORY (
	[INVENTORY_ID]       INT         PRIMARY KEY    NOT NULL   IDENTITY(1,1)                        ,
	[VEHICLE_ID]         INT                        NOT NULL                                        ,
	[DEALER_ID]          INT                        NOT NULL                                        ,
	[INVENTORYADDDATE]   DATETIME                   NOT NULL   DEFAULT(GETDATE())                   ,


	CONSTRAINT  FK_INV_VEHICLE_ID FOREIGN KEY (VEHICLE_ID)
		REFERENCES VEHICLE(VEHICLE_ID)
			ON DELETE CASCADE
			ON UPDATE CASCADE,
	CONSTRAINT FK_INV_DEALER_ID FOREIGN KEY (DEALER_ID)
		REFERENCES DEALER (DEALER_ID)
			ON DELETE CASCADE
			ON UPDATE CASCADE
 );

  CREATE TABLE LOAN (
	[LOAN_ID]        INT    PRIMARY KEY    NOT NULL    IDENTITY(1001,1)     ,
	[DEALER_ID]      INT                   NOT NULL                         ,
	[VEHICLE_ID]     INT    UNIQUE         NOT NULL                         ,
	[LOAN_AMOUNT]    MONEY                 NOT NULL                         ,
	[APR_RATE]       FLOAT                 NOT NULL                         ,
	[LOAN_LENGTH]    INT                   NOT NULL                         ,
	[MIN_PAYMENT]    MONEY                 NOT NULL                         ,
	[CURR_PRINC_AMT] MONEY                 NOT NULL                         ,

	CONSTRAINT  FK_LOAN_DEALER_ID FOREIGN KEY (DEALER_ID)
		REFERENCES DEALER(DEALER_ID)
			ON DELETE CASCADE
			ON UPDATE CASCADE,

	CONSTRAINT FK_LOAN_VEHICLE_ID FOREIGN KEY (VEHICLE_ID)
		REFERENCES VEHICLE (VEHICLE_ID)  
			ON DELETE CASCADE
			ON UPDATE CASCADE                                           
 );

     CREATE TABLE TRANSACTIONS ( 
	[TRANSACTION_ID]     INT         PRIMARY KEY    NOT NULL   IDENTITY(1,1)                          ,
	[LOAN_ID]            INT                        NOT NULL                                          ,
	[TRANSACTION_DATE]   DATETIME                   NOT NULL   DEFAULT(GETDATE())                     ,
	[TRANSACTION_AMT]    MONEY                      NOT NULL                                          ,


	CONSTRAINT FK_TRANS_LOAN_ID FOREIGN KEY (LOAN_ID)
		REFERENCES LOAN (LOAN_ID)
 );



 drop table users;
 drop table dealer;
 drop table DEALER_INVENTORY;
 drop table loan;
 drop table transactions;
 drop table vehicle;
 drop table assignments;
