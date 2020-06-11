ALTER PROCEDURE GetAssignedDealers
(
	@USER_ID int
)
AS
BEGIN
	select
	UPPER(d.Dealer_Name) AS "Dealer_Name",
	c.[Count],
	UPPER(d.Address1) as "Address1" , 
	UPPER(d.Address2) as "Address2", 
	UPPER(d.City) as "City", 
	UPPER(d.[State]) as "State", 
	d.[Zip], 
	d.Dealer_Score as "Dealer_Score",
	d.DEALER_ID 
	from dealer d
	join ASSIGNMENTS a
	on d.dealer_id = a.dealer_id
	left join (select DEALER_ID, COUNT(*) as "Count" from LOAN group by dealer_id) c
	on c.dealer_id = d.dealer_id
	where a.user_id = @USER_ID;
END


