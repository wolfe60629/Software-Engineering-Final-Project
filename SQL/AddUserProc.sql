CREATE PROCEDURE AddUserProc
(
@Username varchar(50),
@Password varchar(50),
@is_Supervisor bit = 0
)
AS
IF (@is_Supervisor != 0)
BEGIN
	INSERT INTO USERS(USERNAME, PASSWORD_HASH,is_Supervisor)
	VALUES(@Username, HASHBYTES('SHA2_512', @Password), @is_Supervisor)
END
IF (@is_Supervisor = 0)
BEGIN
	INSERT INTO USERS(USERNAME, PASSWORD_HASH)
	VALUES(@Username, HASHBYTES('SHA2_512', @Password))
END