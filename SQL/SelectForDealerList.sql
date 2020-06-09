select
Dealer_Name, 
Address1, 
Address2, 
City, 
[State], 
[Zip], 
'500' as "Dealer_Score"
from dealer
join ASSIGNMENTS
on dealer.dealer_id = assignments.dealer_id
where assignments.user_id = '1'

