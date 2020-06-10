EXEC ADDUSERPROC @Username= 'Jeremy', @Password='Jeremy1996@';

INSERT INTO DEALER(DEALER_NAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIP)
VALUES ('Test Dealer','123 Bord Street', '','Dawsonville', 'GA', 30534);


SELECT * FROM users

insert into assignments (dealer_id,user_id)
values (15,3)