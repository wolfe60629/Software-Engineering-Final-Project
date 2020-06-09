CREATE PROCEDURE GetAssignedDealers
(
	@USER_ID int
)
AS
BEGIN
	select
	d.Dealer_Name,
	c.[Count],
	d.Address1, 
	d.Address2, 
	d.City, 
	d.[State], 
	d.[Zip], 
	'500' as "Dealer_Score"
	from dealer d
	join ASSIGNMENTS a
	on d.dealer_id = a.dealer_id
	left join (select DEALER_ID, COUNT(*) as "Count" from LOAN group by dealer_id) c
	on c.dealer_id = d.dealer_id
	where a.user_id = @USER_ID;
END


