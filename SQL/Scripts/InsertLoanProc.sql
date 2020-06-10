CREATE PROCEDURE INSERTLOANPROC
(
	@Dealer_ID int,
	@CarYear int,
	@Make varchar(50),
	@Model varchar(50),
	@VIN varchar(17),
	@Loan_Amount Money,
	@APR_RATE FLOAT = 3.3
)
AS
BEGIN
	INSERT INTO VEHICLE([YEAR],MAKE,MODEL,VIN)
		VALUES(@CarYear, @Make, @Model, @VIN)
END		
BEGIN
	DECLARE @Vehicle_id int
	SET @Vehicle_id = (select vehicle_ID from VEHICLE where vin = @vin)
	
	INSERT INTO LOAN(VEHICLE_ID, DEALER_ID, LOAN_AMOUNT , APR_RATE)
		VALUES(@Vehicle_id,@DEALER_ID,@LOAN_AMOUNT, @APR_RATE)
	
END
